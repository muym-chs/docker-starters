#!/bin/sh
if [ ! -z $LANDO_MOUNT ]; then
  ##################################
  # Install app.                   #
  ##################################
  composer install;
  ##################################
  # Load app settings.             #
  ##################################
  if [ ! -e "/app/sites/default/settings.php" ]
    then
      ./lando_assets/scripts/prepare_appserver_install.sh
  fi
  cp ./lando_assets/appserver/settings.php /app/sites/default/
  ##################################
  # Drop and recover last dump.    #
  ##################################
#  drush sql-drop -y;
#  zcat lando_assets/db_dump/drupal8_initrecoverymount.sql.gz | drush sql-cli;
  drush cr;
fi
