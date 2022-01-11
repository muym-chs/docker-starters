/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/
CKEDITOR.plugins.add('default_ckeditor_button', {
    init: function( editor ) {
        if ( editor.ui.addButton ) {
            editor.ui.addButton( 'Default ckeditor button', {
                label: 'default ckeditor button',
                id: 'Default ckeditor button',
                command: '',
                toolbar: 'Default ckeditor button,10',
            } );
        }
    }
} );