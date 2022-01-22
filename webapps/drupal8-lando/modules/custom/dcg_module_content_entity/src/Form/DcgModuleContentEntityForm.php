<?php

namespace Drupal\dcg_module_content_entity\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the dcg_module_content_entity entity edit forms.
 */
class DcgModuleContentEntityForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {

    $entity = $this->getEntity();
    $result = $entity->save();
    $link = $entity->toLink($this->t('View'))->toRenderable();

    $message_arguments = ['%label' => $this->entity->label()];
    $logger_arguments = $message_arguments + ['link' => render($link)];

    if ($result == SAVED_NEW) {
      $this->messenger()->addStatus($this->t('New dcg_module_content_entity %label has been created.', $message_arguments));
      $this->logger('dcg_module_content_entity')->notice('Created new dcg_module_content_entity %label', $logger_arguments);
    }
    else {
      $this->messenger()->addStatus($this->t('The dcg_module_content_entity %label has been updated.', $message_arguments));
      $this->logger('dcg_module_content_entity')->notice('Updated new dcg_module_content_entity %label.', $logger_arguments);
    }

    $form_state->setRedirect('entity.dcg_module_content_entity.canonical', ['dcg_module_content_entity' => $entity->id()]);
  }

}
