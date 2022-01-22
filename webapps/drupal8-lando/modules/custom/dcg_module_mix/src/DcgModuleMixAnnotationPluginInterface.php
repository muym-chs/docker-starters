<?php

namespace Drupal\dcg_module_mix;

/**
 * Interface for dcg_module_mix_annotation_plugin plugins.
 */
interface DcgModuleMixAnnotationPluginInterface {

  /**
   * Returns the translated plugin label.
   *
   * @return string
   *   The translated title.
   */
  public function label();

}
