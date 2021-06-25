<?php

/**
 * @file
 * Webform module translation hooks.
 *
 * @see webform_preprocess_table()
 */

use Drupal\Core\Config\Entity\ConfigEntityInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element;
use Drupal\webform\Utility\WebformYaml;

/**
 * Implements hook_form_FORM_ID_alter() for language content settings form.
 */
function webform_form_language_content_settings_form_alter(array &$form, FormStateInterface $form_state) {
  // Completely remove webform_submission from Content language admin
  // settings form, only when there are no previously saved
  // 'language.content_settings.webform_submission.*' config files.
  $has_saved_webform_submissions = count(\Drupal::configFactory()->listAll('language.content_settings.webform_submission.')) ? TRUE : FALSE;
  if (!$has_saved_webform_submissions) {
    unset($form['#label']['webform_submission']);
    unset($form['entity_types']['#options']['webform_submission']);
    unset($form['settings']['webform_submission']);
  }
}

/**
 * Implements hook_form_FORM_ID_alter() for locale translate edit form.
 */
function webform_form_locale_translate_edit_form_alter(&$form, FormStateInterface $form_state) {
  // Don't allow YAML to be validated using locale string translation.
  foreach (Element::children($form['strings']) as $key) {
    $element =& $form['strings'][$key];
    if ($element['original']
      && !empty($element['original']['#plain_text'])
      && preg_match("/'#[^']+':/", $element['original']['#plain_text'])
      && WebformYaml::isValid($element['original']['#plain_text'])) {
      $element['original'] = [
        '#theme' => 'webform_codemirror',
        '#code' => $element['original']['#plain_text'],
        '#type' => 'yaml',
      ];
      $element['translations'] = [
        '#type' => 'webform_message',
        '#message_type' => 'warning',
        '#message_message' => t("Webforms can only be translated via the Webform's (Configuration) Translate tab."),
      ];
    }
  }
}

/******************************************************************************/
// Configuration translation.
/******************************************************************************/

/**
 * Implements hook_form_FORM_ID_alter() for config translation add form.
 */
function webform_form_config_translation_add_form_alter(&$form, FormStateInterface $form_state, $is_new = TRUE) {
  /** @var \Drupal\webform\WebformTranslationConfigManagerInterface $translation_config_manager */
  $translation_config_manager = \Drupal::service('webform.translation_config_manager');
  $translation_config_manager->alterForm($form, $form_state);
}

<<<<<<< HEAD
/**
 * Alter form element recursively.
 *
 * @param array $elements
 *   An associative array of form elements.
 * @param array $element_alterations
 *   An associative array of element alterations.
 */
function _webform_form_config_translation_add_form_alter_elements(array &$elements, array $element_alterations) {
  foreach ($elements as $key => &$element) {
    if (WebformElementHelper::property($key) || !is_array($element)) {
      continue;
    }

    // Override/alter translation element.
    if (array_key_exists($key, $element_alterations)
      && isset($element['translation'])
      && isset($element['translation']['#type'])) {
      $element['translation'] = $element_alterations[$key] + $element['translation'];
    }

    _webform_form_config_translation_add_form_alter_elements($element, $element_alterations);

  }
}

/**
 * Validate callback; Validates and cleanups webform elements.
 */
function _webform_form_config_translate_add_form_validate(&$form, FormStateInterface $form_state) {
  if ($form_state::hasAnyErrors()) {
    return;
  }

  $values = $form_state->getValues();

  $config_name = $form_state->get('webform_config_name');
  $source_elements = $form_state->get('webform_source_elements');
  $submitted_translation_elements = Yaml::decode($values['translation']['config_names'][$config_name]['elements']);
  $translation_elements = $source_elements;

  // Remove all custom translation properties.
  WebformElementHelper::merge($translation_elements, $submitted_translation_elements);

  // Remove any translation property that has not been translated.
  _webform_form_config_translate_add_form_filter_elements($translation_elements, $source_elements);

  // Update webform value.
  $values['translation']['config_names'][$config_name]['elements'] = ($translation_elements) ? Yaml::encode($translation_elements) : '';
  $form_state->setValues($values);
}

/**
 * Merge element properties.
 *
 * @param array $translation_elements
 *   An array of elements.
 * @param array $source_elements
 *   An array of elements to be merged.
 */
function _webform_form_config_translate_add_form_filter_elements(array &$translation_elements, array $source_elements) {
  foreach ($translation_elements as $key => &$translation_element) {
    if (!isset($source_elements[$key])) {
      continue;
    }
    $source_element = $source_elements[$key];
    if ($translation_element === $source_element) {
      unset($translation_elements[$key]);
    }
    elseif (is_array($translation_element)) {
      _webform_form_config_translate_add_form_filter_elements($translation_element, $source_element);
      if (empty($translation_element)) {
        unset($translation_elements[$key]);
      }
    }
  }
}
=======
>>>>>>> dev

/**
 * Implements hook_form_FORM_ID_alter() for config translation edit form.
 */
function webform_form_config_translation_edit_form_alter(&$form, FormStateInterface $form_state) {
  /** @var \Drupal\webform\WebformTranslationConfigManagerInterface $translation_config_manager */
  $translation_config_manager = \Drupal::service('webform.translation_config_manager');
  $translation_config_manager->alterForm($form, $form_state);
}

/******************************************************************************/
// Lingotek integration.
/******************************************************************************/

/**
 * Implements hook_lingotek_config_entity_document_upload().
 */
function webform_lingotek_config_entity_document_upload(array &$source_data, ConfigEntityInterface &$entity, &$url) {
  /** @var \Drupal\webform\WebformTranslationLingotekManagerInterface $translation_lingotek_manager */
  $translation_lingotek_manager = \Drupal::service('webform.translation_lingotek_manager');
  $translation_lingotek_manager->configEntityDocumentUpload($source_data, $entity, $url);
}

/**
 * Implements hook_lingotek_config_entity_translation_presave().
 */
function webform_lingotek_config_entity_translation_presave(ConfigEntityInterface &$translation, $langcode, &$data) {
<<<<<<< HEAD
  switch ($translation->getEntityTypeId()) {
    case 'field_config':
      // Convert webform default data associative array back to YAML string.
      /** @var \Drupal\field\Entity\FieldConfig $translation */
      if ($translation->getFieldStorageDefinition()->getType() === 'webform') {
        foreach ($data as &$field_settings) {
          _webform_lingotek_encode_tokens($field_settings);
          foreach ($field_settings as $setting_name => $setting_value) {
            if (preg_match('/\.default_data$/', $setting_name)) {
              $field_settings[$setting_name] = $field_settings[$setting_name] ? Yaml::encode($field_settings[$setting_name]) : '';
            }
          }
        }
      }
      break;

    case 'webform';
      _webform_lingotek_decode_tokens($data);

      /** @var \Drupal\webform\WebformInterface $translation */
      $translation->setElements($data['elements']);
      $data['elements'] = Yaml::encode($data['elements']);
      break;

    case 'webform_options';
    case 'webform_options_custom';
      $options = $data['options'];
      // If '_optgroups_' are defined we need to translate the optgroups.
      if (isset($options['_optgroups_'])) {
        // Get optgroup from options.
        $optgroups = $options['_optgroups_'];
        unset($options['_optgroups_']);

        // Build translated optgroup options.
        $optgroups_options = [];
        foreach ($options as $option_value => $option_text) {
          if (is_array($option_text)) {
            $optgroups_options[$optgroups[$option_value]] = $option_text;
          }
          else {
            $optgroup_options[$option_value] = $option_text;
          }
        }
        // Replace options with optgroup options.
        $options = $optgroups_options;
      }

      /** @var \Drupal\webform\WebformOptionsInterface $translation */
      // Convert options associative array back to YAML string.
      $translation->setOptions($options);
      $data['options'] = Yaml::encode($options);
      break;
  }
=======
  /** @var \Drupal\webform\WebformTranslationLingotekManagerInterface $translation_lingotek_manager */
  $translation_lingotek_manager = \Drupal::service('webform.translation_lingotek_manager');
  $translation_lingotek_manager->configEntityTranslationPresave($translation, $langcode, $data);
>>>>>>> dev
}

/**
 * Implements hook_lingotek_config_object_document_upload().
 */
function webform_lingotek_config_object_document_upload(array &$data, $config_name) {
  /** @var \Drupal\webform\WebformTranslationLingotekManagerInterface $translation_lingotek_manager */
  $translation_lingotek_manager = \Drupal::service('webform.translation_lingotek_manager');
  $translation_lingotek_manager->configObjectDocumentUpload($data, $config_name);
}

/**
 * Implements hook_lingotek_config_object_translation_presave().
 */
function webform_lingotek_config_object_translation_presave(array &$data, $config_name) {
  /** @var \Drupal\webform\WebformTranslationLingotekManagerInterface $translation_lingotek_manager */
  $translation_lingotek_manager = \Drupal::service('webform.translation_lingotek_manager');
  $translation_lingotek_manager->configObjectTranslationPresave($data, $config_name);
}
