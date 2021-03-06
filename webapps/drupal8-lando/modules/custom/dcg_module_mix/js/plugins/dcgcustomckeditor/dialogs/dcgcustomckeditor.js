/**
 * @file
 * Defines dialog for DcgCustomCKEditor CKEditor plugin.
 */

(function (Drupal) {

  'use strict';

  // Dialog definition.
  CKEDITOR.dialog.add('dcgcustomckeditorDialog', function (editor) {

    return {

      // Basic properties of the dialog window: title, minimum size.
      title: Drupal.t('Abbreviation properties'),
      minWidth: 400,
      minHeight: 150,

      // Dialog window content definition.
      contents: [
        {
          // Definition of the settings dialog tab.
          id: 'tab-settings',
          label: 'Settings',

          // The tab content.
          elements: [
            {
              // Text input field for the abbreviation text.
              type: 'text',
              id: 'abbr',
              label: Drupal.t('Abbreviation'),

              // Validation checking whether the field is not empty.
              validate: CKEDITOR.dialog.validate.notEmpty(Drupal.t('Abbreviation field cannot be empty.'))
            },
            {
              // Text input field for the abbreviation title (explanation).
              type: 'text',
              id: 'title',
              label: Drupal.t('Explanation'),
              validate: CKEDITOR.dialog.validate.notEmpty(Drupal.t('Explanation field cannot be empty.'))
            }
          ]
        }
      ],

      // This method is invoked once a user clicks the OK button, confirming the
      // dialog.
      onOk: function () {

        // The context of this function is the dialog object itself.
        // See http://docs.ckeditor.com/#!/api/CKEDITOR.dialog.
        var dialog = this;

        // Create a new <abbr> element.
        var abbr = editor.document.createElement('abbr');

        // Set element attribute and text by getting the defined field values.
        abbr.setAttribute('title', dialog.getValueOf('tab-settings', 'title'));
        abbr.setText(dialog.getValueOf('tab-settings', 'abbr'));

        // Finally, insert the element into the editor at the caret position.
        editor.insertElement(abbr);
      }
    };

  });

} (Drupal));
