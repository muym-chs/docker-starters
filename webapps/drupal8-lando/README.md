
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

From github.com:muym-chs/docker-starters
3698538..29446f1  main       -> origin/main
Updating 3698538..29446f1
Fast-forward
drupal8-lando/console/sites/demo_site_dev.yml                                                                        |   6 ++++
drupal8-lando/console/sites/demo_site_prod.yml                                                                       |   6 ++++
drupal8-lando/console/sites/demo_site_test.yml                                                                       |   6 ++++
drupal8-lando/modules/custom/skeleton_module/composer.json                                                           |   7 ++++
drupal8-lando/modules/custom/skeleton_module/config/install/core.entity_form_display.node.default.default.yml        |  60 ++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/config/install/core.entity_view_display.node.default.default.yml        |  23 +++++++++++++
drupal8-lando/modules/custom/skeleton_module/config/install/core.entity_view_display.node.default.teaser.yml         |  25 ++++++++++++++
drupal8-lando/modules/custom/skeleton_module/config/install/field.field.node.default.body.yml                        |  21 ++++++++++++
drupal8-lando/modules/custom/skeleton_module/config/install/node.type.default.yml                                    |  17 ++++++++++
drupal8-lando/modules/custom/skeleton_module/config/install/skeleton_module.default.yml                              |   2 ++
drupal8-lando/modules/custom/skeleton_module/config/install/skeleton_module.defaultformconfig.yml                    |   2 ++
drupal8-lando/modules/custom/skeleton_module/config/schema/default_config_entity.schema.yml                          |  12 +++++++
drupal8-lando/modules/custom/skeleton_module/console.services.yml                                                    |  11 ++++++
drupal8-lando/modules/custom/skeleton_module/console/translations/en/skeleton_module.default.yml                     |   5 +++
drupal8-lando/modules/custom/skeleton_module/default_content_entity.page.inc                                         |  30 ++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/js/Plugin/default_ckeditor_button/plugin.js                             |  18 ++++++++++
drupal8-lando/modules/custom/skeleton_module/js/script.js                                                            |  10 ++++++
drupal8-lando/modules/custom/skeleton_module/skeleton_module.example.plugin.yaml.yml                                 |   8 +++++
drupal8-lando/modules/custom/skeleton_module/skeleton_module.info.yml                                                |   5 +++
drupal8-lando/modules/custom/skeleton_module/skeleton_module.install                                                 |   8 +++++
drupal8-lando/modules/custom/skeleton_module/skeleton_module.libraries.yml                                           |   5 +++
drupal8-lando/modules/custom/skeleton_module/skeleton_module.links.action.yml                                        |  10 ++++++
drupal8-lando/modules/custom/skeleton_module/skeleton_module.links.menu.yml                                          |  28 +++++++++++++++
drupal8-lando/modules/custom/skeleton_module/skeleton_module.links.task.yml                                          |  21 ++++++++++++
drupal8-lando/modules/custom/skeleton_module/skeleton_module.module                                                  |  84 +++++++++++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/skeleton_module.permissions.yml                                         |  26 ++++++++++++++
drupal8-lando/modules/custom/skeleton_module/skeleton_module.post_update.php                                         |   8 +++++
drupal8-lando/modules/custom/skeleton_module/skeleton_module.routing.yml                                             |  24 +++++++++++++
drupal8-lando/modules/custom/skeleton_module/skeleton_module.schema.yml                                              |  10 ++++++
drupal8-lando/modules/custom/skeleton_module/skeleton_module.services.yml                                            |  37 ++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/skeleton_module.views.inc                                               |  28 +++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Ajax/AjaxCommand.php                                                |  25 ++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Annotation/ExamplePlugin.php                                        |  34 +++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Authentication/Provider/DefaultAuthenticationProvider.php           |  95 +++++++++++++++++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/CacheContext/DefaultCacheContext.php                                |  50 +++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Command/DefaultCommand.php                                          |  69 +++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Controller/DefaultController.php                                    |  42 +++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/DefaultConfigEntityHtmlRouteProvider.php                            |  26 ++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/DefaultConfigEntityListBuilder.php                                  |  32 +++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/DefaultContentEntityAccessControlHandler.php                        |  55 ++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/DefaultContentEntityHtmlRouteProvider.php                           |  56 ++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/DefaultContentEntityListBuilder.php                                 |  39 +++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/DefaultContentEntityTranslationHandler.php                          |  13 +++++++
drupal8-lando/modules/custom/skeleton_module/src/DefaultLinkRelationType.php                                         |  88 +++++++++++++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/DefaultService.php                                                  |  17 ++++++++++
drupal8-lando/modules/custom/skeleton_module/src/DefaultServiceInterface.php                                         |  11 ++++++
drupal8-lando/modules/custom/skeleton_module/src/Entity/DefaultConfigEntity.php                                      |  57 +++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Entity/DefaultConfigEntityInterface.php                             |  13 +++++++
drupal8-lando/modules/custom/skeleton_module/src/Entity/DefaultContentEntity.php                                     | 139 ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Entity/DefaultContentEntityInterface.php                            |  58 +++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Entity/DefaultContentEntityViewsData.php                            |  23 +++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/EventSubscriber/DefaultSubscriber.php                               |  47 +++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/ExamplePluginYamlManager.php                                        |  68 +++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/ExamplePluginYamlManagerInterface.php                               |  14 ++++++++
drupal8-lando/modules/custom/skeleton_module/src/Form/DefaultConfigEntityDeleteForm.php                              |  51 ++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Form/DefaultConfigEntityForm.php                                    |  65 +++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Form/DefaultContentEntityDeleteForm.php                             |  15 ++++++++
drupal8-lando/modules/custom/skeleton_module/src/Form/DefaultContentEntityForm.php                                   |  66 ++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Form/DefaultContentEntitySettingsForm.php                           |  53 +++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Form/DefaultForm.php                                                |  84 +++++++++++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Form/DefaultFormConfig.php                                          |  79 ++++++++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Generator/DefaultGenerator.php                                      |  27 +++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/Block/CustomBlockDerivative.php                              |  79 ++++++++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/Block/DefaultBlockContentType.php                            |  19 +++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/Block/DefaultPluginBlock.php                                 | 120 ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/CKEditorPlugin/DefaultCKEditorButton.php                     |  84 +++++++++++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/Condition/ExampleCondition.php                               |  99 +++++++++++++++++++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/Derivative/CustomBlockDerivative.php                         |  61 +++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/ExamplePluginBase.php                                        |  15 ++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/ExamplePluginInterface.php                                   |  15 ++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/ExamplePluginManager.php                                     |  33 ++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/Field/FieldFormatter/ExampleFormatterType.php                |  80 +++++++++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/Field/FieldType/ExampleFieldType.php                         | 127 ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/Field/FieldWidget/ExampleWidgetType.php                      |  85 ++++++++++++++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/ImageEffect/DefaultImageEffect.php                           |  27 +++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/Mail/HtmlFormatterMail.php                                   |  47 +++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/QueueWorker/ExampleQueue.php                                 |  25 ++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/RulesAction/DefaultAction.php                                |  39 +++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/RulesDataProcessor/DefaultDataprocessor.php                  |  26 ++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/Validation/Constraint/ExampleConstraint.php                  |  25 ++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/Validation/Constraint/ExampleConstraintValidator.php         |  38 +++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/migrate/process/SkeletonModuleMigrateProcessPlugin.php       |  25 ++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/migrate/source/SkeletonModuleMigrateSourcePlugin.php         |  44 ++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/migrate_plus/data_parser/SkeletonModuleMigrateDataParser.php |  31 +++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/rest/resource/DefaultRestResource.php                        |  63 ++++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Plugin/views/field/CustomViewsField.php                             |  61 +++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/src/Routing/RouteSubscriber.php                                         |  20 +++++++++++
drupal8-lando/modules/custom/skeleton_module/src/TwigExtension/DefaultTwigExtension.php                              |  61 +++++++++++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/templates/default-plugin-block.html.twig                                |  18 ++++++++++
drupal8-lando/modules/custom/skeleton_module/templates/default_content_entity.html.twig                              |  22 ++++++++++++
drupal8-lando/modules/custom/skeleton_module/templates/skeleton-module.html.twig                                     |   1 +
drupal8-lando/modules/custom/skeleton_module/tests/Controller/DefaultControllerTest.php                              |  47 +++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/tests/src/Functional/LoadTest.php                                       |  46 +++++++++++++++++++++++++
drupal8-lando/modules/custom/skeleton_module/tests/src/FunctionalJavascript/DefaultJsTest.php                        |  48 ++++++++++++++++++++++++++
drupal8-lando/profiles/custom/demo_profile/demo_profile.info.yml                                                     |  10 ++++++
drupal8-lando/profiles/custom/demo_profile/demo_profile.install                                                      |  21 ++++++++++++
drupal8-lando/profiles/custom/demo_profile/demo_profile.profile                                                      |   8 +++++
drupal8-lando/themes/custom/demo_theme/demo_theme.breakpoints.yml                                                    |  18 ++++++++++
drupal8-lando/themes/custom/demo_theme/demo_theme.info.yml                                                           |  15 ++++++++
drupal8-lando/themes/custom/demo_theme/demo_theme.theme                                                              | 145 ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
100 files changed, 3822 insertions(+)
create mode 100644 drupal8-lando/console/sites/demo_site_dev.yml
create mode 100644 drupal8-lando/console/sites/demo_site_prod.yml
create mode 100644 drupal8-lando/console/sites/demo_site_test.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/composer.json
create mode 100644 drupal8-lando/modules/custom/skeleton_module/config/install/core.entity_form_display.node.default.default.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/config/install/core.entity_view_display.node.default.default.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/config/install/core.entity_view_display.node.default.teaser.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/config/install/field.field.node.default.body.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/config/install/node.type.default.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/config/install/skeleton_module.default.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/config/install/skeleton_module.defaultformconfig.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/config/schema/default_config_entity.schema.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/console.services.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/console/translations/en/skeleton_module.default.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/default_content_entity.page.inc
create mode 100644 drupal8-lando/modules/custom/skeleton_module/js/Plugin/default_ckeditor_button/plugin.js
create mode 100644 drupal8-lando/modules/custom/skeleton_module/js/script.js
create mode 100644 drupal8-lando/modules/custom/skeleton_module/skeleton_module.example.plugin.yaml.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/skeleton_module.info.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/skeleton_module.install
create mode 100644 drupal8-lando/modules/custom/skeleton_module/skeleton_module.libraries.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/skeleton_module.links.action.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/skeleton_module.links.menu.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/skeleton_module.links.task.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/skeleton_module.module
create mode 100644 drupal8-lando/modules/custom/skeleton_module/skeleton_module.permissions.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/skeleton_module.post_update.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/skeleton_module.routing.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/skeleton_module.schema.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/skeleton_module.services.yml
create mode 100644 drupal8-lando/modules/custom/skeleton_module/skeleton_module.views.inc
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Ajax/AjaxCommand.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Annotation/ExamplePlugin.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Authentication/Provider/DefaultAuthenticationProvider.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/CacheContext/DefaultCacheContext.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Command/DefaultCommand.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Controller/DefaultController.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/DefaultConfigEntityHtmlRouteProvider.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/DefaultConfigEntityListBuilder.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/DefaultContentEntityAccessControlHandler.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/DefaultContentEntityHtmlRouteProvider.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/DefaultContentEntityListBuilder.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/DefaultContentEntityTranslationHandler.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/DefaultLinkRelationType.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/DefaultService.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/DefaultServiceInterface.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Entity/DefaultConfigEntity.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Entity/DefaultConfigEntityInterface.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Entity/DefaultContentEntity.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Entity/DefaultContentEntityInterface.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Entity/DefaultContentEntityViewsData.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/EventSubscriber/DefaultSubscriber.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/ExamplePluginYamlManager.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/ExamplePluginYamlManagerInterface.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Form/DefaultConfigEntityDeleteForm.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Form/DefaultConfigEntityForm.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Form/DefaultContentEntityDeleteForm.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Form/DefaultContentEntityForm.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Form/DefaultContentEntitySettingsForm.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Form/DefaultForm.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Form/DefaultFormConfig.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Generator/DefaultGenerator.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/Block/CustomBlockDerivative.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/Block/DefaultBlockContentType.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/Block/DefaultPluginBlock.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/CKEditorPlugin/DefaultCKEditorButton.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/Condition/ExampleCondition.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/Derivative/CustomBlockDerivative.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/ExamplePluginBase.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/ExamplePluginInterface.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/ExamplePluginManager.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/Field/FieldFormatter/ExampleFormatterType.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/Field/FieldType/ExampleFieldType.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/Field/FieldWidget/ExampleWidgetType.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/ImageEffect/DefaultImageEffect.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/Mail/HtmlFormatterMail.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/QueueWorker/ExampleQueue.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/RulesAction/DefaultAction.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/RulesDataProcessor/DefaultDataprocessor.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/Validation/Constraint/ExampleConstraint.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/Validation/Constraint/ExampleConstraintValidator.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/migrate/process/SkeletonModuleMigrateProcessPlugin.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/migrate/source/SkeletonModuleMigrateSourcePlugin.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/migrate_plus/data_parser/SkeletonModuleMigrateDataParser.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/rest/resource/DefaultRestResource.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Plugin/views/field/CustomViewsField.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/Routing/RouteSubscriber.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/src/TwigExtension/DefaultTwigExtension.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/templates/default-plugin-block.html.twig
create mode 100644 drupal8-lando/modules/custom/skeleton_module/templates/default_content_entity.html.twig
create mode 100644 drupal8-lando/modules/custom/skeleton_module/templates/skeleton-module.html.twig
create mode 100644 drupal8-lando/modules/custom/skeleton_module/tests/Controller/DefaultControllerTest.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/tests/src/Functional/LoadTest.php
create mode 100644 drupal8-lando/modules/custom/skeleton_module/tests/src/FunctionalJavascript/DefaultJsTest.php
create mode 100644 drupal8-lando/profiles/custom/demo_profile/demo_profile.info.yml
create mode 100644 drupal8-lando/profiles/custom/demo_profile/demo_profile.install
create mode 100644 drupal8-lando/profiles/custom/demo_profile/demo_profile.profile
create mode 100644 drupal8-lando/themes/custom/demo_theme/demo_theme.breakpoints.yml
create mode 100644 drupal8-lando/themes/custom/demo_theme/demo_theme.info.yml
create mode 100644 drupal8-lando/themes/custom/demo_theme/demo_theme.theme
