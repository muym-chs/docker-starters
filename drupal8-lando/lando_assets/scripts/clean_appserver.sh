#!/bin/sh
if [ ! -z $LANDO_MOUNT ]; then
  ##################################
  # Dump DB.                       #
  ##################################
  drush cr
  drush sql:dump --gzip > ./lando_assets/db_dump/drupal8_`date "+%Y-%m-%d%H:%M:%S"`.sql.gz
  ##################################
  # Clean app vendors files.       #
  ##################################
  rm -rf autoload.php core .csslintrc .editorconfig .eslintignore .eslintrc.json example.gitignore .gitattributes .htaccess .ht.router.php index.php README.txt INSTALL.txt LICENSE.txt modules profiles robots.txt sites themes update.php vendor web.config
fi
