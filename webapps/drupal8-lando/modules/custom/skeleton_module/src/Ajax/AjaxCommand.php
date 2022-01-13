<?php

namespace Drupal\skeleton_module\Ajax;

use Drupal\Core\Ajax\CommandInterface;

/**
 * Class AjaxCommand.
 */
class AjaxCommand implements CommandInterface {

  /**
   * Render custom ajax command.
   *
   * @return ajax
   *   Command function.
   */
  public function render() {
    return [
      'command' => 'append',
      'message' => 'My Awesome Message',
    ];
  }

}
