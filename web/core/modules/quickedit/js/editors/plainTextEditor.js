/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/
(function ($, _, Drupal) {
  Drupal.quickedit.editors.plain_text = Drupal.quickedit.EditorView.extend({
    $textElement: null,
    initialize: function initialize(options) {
      Drupal.quickedit.EditorView.prototype.initialize.call(this, options);
      var editorModel = this.model;
      var fieldModel = this.fieldModel;
      var $fieldItems = this.$el.find('.quickedit-field');
      var $textElement = $fieldItems.length ? $fieldItems.eq(0) : this.$el;
      this.$textElement = $textElement;
      editorModel.set('originalValue', this.$textElement[0].textContent.trim());
      var previousText = editorModel.get('originalValue');
      $textElement.on('keyup paste', function (event) {
        var currentText = $textElement[0].textContent.trim();
        if (previousText !== currentText) {
          previousText = currentText;
          editorModel.set('currentValue', currentText);
          fieldModel.set('state', 'changed');
        }
      });
    },
    getEditedElement: function getEditedElement() {
      return this.$textElement;
    },
    stateChange: function stateChange(fieldModel, state, options) {
      var from = fieldModel.previous('state');
      var to = state;
      switch (to) {
        case 'inactive':
          break;
        case 'candidate':
          if (from !== 'inactive') {
            this.$textElement.removeAttr('contenteditable');
          }
          if (from === 'invalid') {
            this.removeValidationErrors();
          }
          break;
        case 'highlighted':
          break;
        case 'activating':
          _.defer(function () {
            fieldModel.set('state', 'active');
          });
          break;
        case 'active':
          this.$textElement.attr('contenteditable', 'true');
          break;
        case 'changed':
          break;
        case 'saving':
          if (from === 'invalid') {
            this.removeValidationErrors();
          }
          this.save(options);
          break;
        case 'saved':
          break;
        case 'invalid':
          this.showValidationErrors();
          break;
      }
    },
    getQuickEditUISettings: function getQuickEditUISettings() {
      return {
        padding: true,
        unifiedToolbar: false,
        fullWidthToolbar: false,
        popup: false
      };
    },
    revert: function revert() {
      this.$textElement.html(this.model.get('originalValue'));
    }
  });
})(jQuery, _, Drupal);