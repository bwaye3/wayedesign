<?php

namespace Drupal\testing_example\Controller;

use Drupal\examples\Utility\DescriptionTemplateTrait;

/**
 * Controller for testing_example module.
 *
 * This class uses the DescriptionTemplateTrait to display text we put in the
 * templates/hello-world.html.twig file.  We render out the text via its
 * description() method, and set up our routing to point to
 * TestingExampleController::description().
 */
class TestingExampleController {

  use DescriptionTemplateTrait;

  /**
   * {@inheritdoc}
   */
  protected function getModuleName() {
    return 'testing_example';
  }

  /**
   * Generate a render array for the Simpletest description.
   *
   * @return array
   *   A render array.
   */
  public function simpletestDescription() {
    $template_file = \Drupal::service('extension.list.module')->getPath('testing_example') . '/templates/simpletest.hello-world.html.twig';
    $build = [
      'description' => [
        '#type' => 'inline_template',
        '#template' => file_get_contents($template_file),
      ],
    ];
    return $build;
  }

}
