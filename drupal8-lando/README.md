
CONTENTS OF THIS FILE
---------------------

 * About


About
------------

Prepare your Landofile:
cp lando.yml .lando.yml

Launch:
 * lando start

Stop:
 * lando destroy

Tooling:
* lando composer          | Runs composer commands
* lando db-export [file]  | Exports database from a service into a file
* lando db-import <file>  | Imports a dump file into database service
* lando drupal            | Runs drupal console commands
* lando drush             | Runs drush commands
* lando mysql             | Drops into a MySQL shell on a database service
* lando php               | Runs php commands

DB export:
 * lando db-export lando_assets/db_dump/drupal8_`date "+%Y-%m-%d%H:%M:%S"`

DB preload:
 * lando_assets/db_dump/drupal8_initrecoverymount.gz

Admin credentials: admin:admin
