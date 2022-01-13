Description
===============================================================================

Simplify your media assets and send more responses by giving less size of the HTTP packet.

CSS functionality:
- imsc:css Scan CSS
- ims:css Status of Scan CSS
- imr:css Revert Minify CSS
- im:css Minify CSS

Scan CSS - imsc:css

Update the set of files to minify, using default parameters configured by the module itself: whitelist_included="core/,modules/,themes/,libraries/,profiles/" and blacklist_regex="*node_modules*,*vendor*"
$./vendor/bin/drush imsc:css

By configuring default values
$./vendor/bin/drush imsc:css core/,modules/,themes/,libraries/,profiles/ *node_modules*,*vendor*

Status of Scan CSS - ims:css

With Summary only
$./vendor/bin/drush ims:css

Or by detailed files output
$./vendor/bin/drush ims:css --full

Revert Minify CSS - imr:css

$./vendor/bin/drush imr:css

Minify CSS - im:css

Minify files set after Scan of the configured policies group
$./vendor/bin/drush im:css

Drupal version   : 9.2.1 ( vanilla minimal installation )
Before minify CSS assets:
1032 CSS files (0 minified). The size of all original files is 2.1 MB and the size of all of the minified files is 0 for a savings of 0 (0% smaller overall)

After minify CSS assets:
1032 CSS files (1032 minified). The size of all original files is 2.1 MB and the size of all of the minified files is 1.5 MB for a savings of 617.73 KB (28.71% smaller overall)
