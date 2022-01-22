/**
 * @file
 * DcgCustomCKEditor CKEditor plugin.
 *
 * Basic plugin inserting abbreviation elements into the CKEditor editing area.
 *
 * @DCG The code is based on an example from CKEditor Plugin SDK tutorial.
 *
 * @see http://docs.ckeditor.com/#!/guide/plugin_sdk_sample_1
 */

(function (Drupal) {

  'use strict';

  CKEDITOR.plugins.add('dcg_module_mix_dcgcustomckeditor', {

    // Register the icons.
    icons: 'dcgcustomckeditor',

    // The plugin initialization logic goes inside this method.
    init: function (editor) {

      // Define an editor command that opens our dialog window.
      editor.addCommand('dcgcustomckeditor', new CKEDITOR.dialogCommand('dcgcustomckeditorDialog'));

      // Create a toolbar button that executes the above command.
      editor.ui.addButton('dcgcustomckeditor', {

        // The text part of the button (if available) and the tooltip.
        label: Drupal.t('Insert abbreviation'),

        // The command to execute on click.
        command: 'dcgcustomckeditor',

        // The button placement in the toolbar (toolbar group name).
        toolbar: 'insert'
      });

      // Register our dialog file, this.path is the plugin folder path.
      CKEDITOR.dialog.add('dcgcustomckeditorDialog', this.path + 'dialogs/dcgcustomckeditor.js');
    }
  });

} (Drupal));
