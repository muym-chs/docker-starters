<?php

namespace Drupal\dcg_module_mix;

use Drupal\Component\Plugin\PluginManagerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Extension\ModuleUninstallValidatorInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\StringTranslation\TranslationInterface;

/**
 * Prevents uninstalling of modules providing used block plugins.
 */
class DcgModuleMixUninstallValidator implements ModuleUninstallValidatorInterface {

  use StringTranslationTrait;

  /**
   * The block plugin manager.
   *
   * @var \Drupal\Component\Plugin\PluginManagerInterface
   */
  protected $blockManager;

  /**
   * The block entity storage.
   *
   * @var \Drupal\Core\Config\Entity\ConfigEntityStorageInterface
   */
  protected $blockStorage;

  /**
   * Constructs a new FilterUninstallValidator.
   *
   * @param \Drupal\Component\Plugin\PluginManagerInterface $block_manager
   *   The filter plugin manager.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_manager
   *   The entity manager.
   * @param \Drupal\Core\StringTranslation\TranslationInterface $string_translation
   *   The string translation service.
   */
  public function __construct(PluginManagerInterface $block_manager, EntityTypeManagerInterface $entity_manager, TranslationInterface $string_translation) {
    $this->blockManager = $block_manager;
    $this->blockStorage = $entity_manager->getStorage('block');
    $this->stringTranslation = $string_translation;
  }

  /**
   * {@inheritdoc}
   */
  public function validate($module) {
    $reasons = [];

    foreach ($this->blockStorage->loadMultiple() as $block) {
      /** @var \Drupal\block\BlockInterface $block */
      $definition = $block->getPlugin()
        ->getPluginDefinition();
      if ($definition['provider'] == $module) {
        $message_arguments = [
          ':url' => $block->toUrl('edit-form')->toString(),
          '@block_id' => $block->id(),
        ];
        $reasons[] = $this->t('Provides a block plugin that is in use in the following block: <a href=":url">@block_id</a>', $message_arguments);
      }
    }

    return $reasons;
  }

}
