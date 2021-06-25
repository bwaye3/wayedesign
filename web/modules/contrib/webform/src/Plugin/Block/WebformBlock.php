<?php

namespace Drupal\webform\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\EventSubscriber\MainContentViewSubscriber;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\webform\Utility\WebformYaml;
use Drupal\webform\WebformInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'Webform' block.
 *
 * @Block(
 *   id = "webform_block",
 *   admin_label = @Translation("Webform"),
 *   category = @Translation("Webform")
 * )
 */
class WebformBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The request stack.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * The route match.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  protected $routeMatch;

  /**
   * Entity type manager.
   *
   * @var \Drupal\core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The webform token manager.
   *
   * @var \Drupal\webform\WebformTokenManagerInterface
   */
  protected $tokenManager;

  /**
<<<<<<< HEAD
   * The route match.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  protected $routeMatch;

  /**
   * Creates a WebformBlock instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   The request stack.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\webform\WebformTokenManagerInterface $token_manager
   *   The webform token manager.
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   The current route match.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, RequestStack $request_stack, EntityTypeManagerInterface $entity_type_manager, WebformTokenManagerInterface $token_manager, RouteMatchInterface $route_match = NULL) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->requestStack = $request_stack;
    $this->entityTypeManager = $entity_type_manager;
    $this->tokenManager = $token_manager;
    $this->routeMatch = $route_match ?: \Drupal::routeMatch();
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('request_stack'),
      $container->get('entity_type.manager'),
      $container->get('webform.token_manager'),
      $container->get('current_route_match')
    );
=======
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = new static($configuration, $plugin_id, $plugin_definition);
    $instance->requestStack = $container->get('request_stack');
    $instance->routeMatch = $container->get('current_route_match');
    $instance->entityTypeManager = $container->get('entity_type.manager');
    $instance->tokenManager = $container->get('webform.token_manager');
    return $instance;
>>>>>>> dev
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'webform_id' => '',
      'default_data' => '',
      'redirect' => FALSE,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $wrapper_format = $this->requestStack->getCurrentRequest()
      ->get(MainContentViewSubscriber::WRAPPER_FORMAT);
    $is_off_canvas = in_array($wrapper_format, ['drupal_dialog.off_canvas']);

    // Get title, description, and code example.
    // @see \Drupal\webform\Plugin\Field\FieldWidget\WebformEntityReferenceWidgetTrait::formElement
    $title = $this->t('Default submission data (YAML)');
    $placeholder = $this->t("Enter 'name': 'value' pairs…");
    $description = [
      'content' => ['#markup' => $this->t('Enter submission data as name and value pairs as <a href=":href">YAML</a> which will be used to prepopulate the selected webform.', [':href' => 'https://en.wikipedia.org/wiki/YAML']), '#suffix' => ' '],
      'token' => $this->tokenManager->buildTreeLink(),
    ];
    $default_data_example = [];
    $default_data_example[] = '# ' . $this->t('This is an example of a comment.');
    $default_data_example[] = "element_key: 'some value'";
    $default_data_example[] = '';
    $default_data_example[] = '# ' . $this->t("The below example uses a token to get the current node's title.");
    $default_data_example[] = "title: '[webform_submission:node:title:clear]'";
    $default_data_example[] = '';
    $default_data_example[] = '# ' . $this->t("Add ':clear' to the end token to return an empty value when the token is missing.");
    $default_data_example[] = '# ' . $this->t('The below example uses a token to get a field value from the current node.');
    $default_data_example[] = "full_name: '[webform_submission:node:field_full_name:clear]'";

    $form['#attributes'] = ['class' => ['webform-block-settings-tray-form']];
    $form['webform_id'] = [
      '#type' => 'entity_autocomplete',
      '#title' => $this->t('Webform'),
      '#description' => $this->t('Select the webform that you would like to display in this block.'),
      '#target_type' => 'webform',
      '#required' => TRUE,
      '#default_value' => $this->getWebform(),
    ];
    $form['settings'] = [
      '#type' => 'details',
      '#title' => $this->t('Webform settings'),
    ];
    if ($is_off_canvas) {
      // Using <textarea> and <pre> tags to support off-canvas CSS reset.
      $form['settings']['default_data'] = [
        '#type' => 'textarea',
        '#title' => $title,
        '#description' => $description,
        '#placeholder' => $placeholder,
        '#default_value' => $this->configuration['default_data'],
        '#webform_element' => TRUE,
        '#more_title' => $this->t('Example'),
        '#more' => [
          '#markup' => implode(PHP_EOL, $default_data_example),
          '#prefix' => '<pre>',
          '#suffix' => '</pre>',
        ],
        '#wrapper_attributes' => [
          'class' => ['webform-default-data'],
        ],
      ];
      $form['#attached']['library'][] = 'webform/webform.off_canvas';
    }
    else {
      $form['settings']['default_data'] = [
        '#type' => 'webform_codemirror',
        '#mode' => 'yaml',
        '#title' => $title,
        '#description' => $description,
        '#placeholder' => $placeholder,
        '#default_value' => $this->configuration['default_data'],
        '#webform_element' => TRUE,
        '#more_title' => $this->t('Example'),
        '#more' => [
          '#theme' => 'webform_codemirror',
          '#type' => 'yaml',
          '#code' => implode(PHP_EOL, $default_data_example),
        ],
      ];
    }
    $form['settings']['redirect'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Redirect to the webform'),
      '#default_value' => $this->configuration['redirect'],
      '#return_value' => TRUE,
      '#description' => $this->t('If your webform has multiple pages, this will change the behavior of the "Next" button. This will also affect where validation messages show up after an error.'),
    ];

    $this->tokenManager->elementValidate($form);

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->configuration['webform_id'] = $values['webform_id'];
    $this->configuration['default_data'] = $values['settings']['default_data'];
    $this->configuration['redirect'] = $values['settings']['redirect'];
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $webform = $this->getWebform();
    if (!$webform) {
      if (strpos($this->routeMatch->getRouteName(), 'layout_builder.') === 0) {
        return ['#markup' => $this->t('The webform (@webform) is broken or missing.', ['@webform' => $this->configuration['webform_id']])];
      }
      else {
        return [];
      }
    }

    $build = [
      '#type' => 'webform',
      '#webform' => $webform,
      '#default_data' => WebformYaml::decode($this->configuration['default_data']),
    ];

    // If redirect, set the #action property on the form.
    if ($this->configuration['redirect']) {
      $build['#action'] = $this->getWebform()->toUrl()
        ->setOption('query', $this->requestStack->getCurrentRequest()->query->all())
        ->toString();
    }

    return $build;
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    $webform = $this->getWebform();
    if (!$webform) {
      return AccessResult::forbidden();
    }

    $access_result = $webform->access('submission_create', $account, TRUE);
    if ($access_result->isAllowed()) {
      return $access_result;
    }

    $has_access_denied_message = ($webform->getSetting('form_access_denied') !== WebformInterface::ACCESS_DENIED_DEFAULT);
    return AccessResult::allowedIf($has_access_denied_message)
      ->addCacheableDependency($access_result);
  }

  /**
   * {@inheritdoc}
   */
  public function calculateDependencies() {
    $dependencies = parent::calculateDependencies();

    if ($webform = $this->getWebform()) {
      $dependencies[$webform->getConfigDependencyKey()][] = $webform->getConfigDependencyName();
    }

    return $dependencies;
  }

  /**
   * Get this block instance webform.
   *
   * @return \Drupal\webform\WebformInterface
   *   A webform or NULL.
   */
  protected function getWebform() {
    return $this->entityTypeManager->getStorage('webform')->load($this->configuration['webform_id']);
  }

}
