<?php

namespace Drupal\webform_access\Plugin\Block;

use Drupal\Core\Block\BlockBase;
<<<<<<< HEAD
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Language\LanguageManagerInterface;
=======

>>>>>>> dev
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\webform\EntityStorage\WebformEntityStorageTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'webform_access_group_entity' block.
 *
 * @Block(
 *   id = "webform_access_group_entity",
 *   admin_label = @Translation("Webform access group entities"),
 *   category = @Translation("Webform access")
 * )
 */
class WebformAccessGroupEntityBlock extends BlockBase implements ContainerFactoryPluginInterface {

  use WebformEntityStorageTrait;

  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * The webform access group storage.
   *
   * @var \Drupal\webform_access\WebformAccessGroupStorageInterface
   */
  protected $webformAccessGroupStorage;

  /**
   * The 'language_manager' service.
<<<<<<< HEAD
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * Creates a WebformAccessGroupEntityBlock instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Session\AccountInterface $current_user
   *   The current user.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   The language manager.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, AccountInterface $current_user, EntityTypeManagerInterface $entity_type_manager, LanguageManagerInterface $language_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->currentUser = $current_user;
    $this->webformAccessGroupStorage = $entity_type_manager->getStorage('webform_access_group');
    $this->languageManager = $language_manager;
  }
=======
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;
>>>>>>> dev

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
<<<<<<< HEAD
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('current_user'),
      $container->get('entity_type.manager'),
      $container->get('language_manager')

    );
=======
    $instance = new static($configuration, $plugin_id, $plugin_definition);
    $instance->currentUser = $container->get('current_user');
    $instance->entityTypeManager = $container->get('entity_type.manager');
    $instance->languageManager = $container->get('language_manager');
    return $instance;
>>>>>>> dev
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    /** @var \Drupal\node\NodeInterface[] $nodes */
    $nodes = $this->getEntityStorage('webform_access_group')->getUserEntities($this->currentUser, 'node');
    if (empty($nodes)) {
      return NULL;
    }

    $langcode = $this->languageManager->getCurrentLanguage()->getId();
    $items = [];
    foreach ($nodes as $node) {
      if ($node->access()) {
        if ($node->hasTranslation($langcode)) {
          $node = $node->getTranslation($langcode);
        }
        $items[] = $node->toLink()->toRenderable();
      }
    }
    if (empty($items)) {
      return NULL;
    }

    return [
      '#theme' => 'item_list',
      '#items' => $items,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    // @todo Setup cache tags and context .
    return 0;
  }

}
