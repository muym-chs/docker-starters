<?php

namespace Drupal\skeleton_module\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Drupal\Console\Core\Command\Command;
use Drupal\Console\Core\Generator\GeneratorInterface;

/**
 * Class DefaultCommand.
 *
 * Drupal\Console\Annotations\DrupalCommand (
 *     extension="skeleton_module",
 *     extensionType="module"
 * )
 */
class DefaultCommand extends Command {

  /**
   * Drupal\Console\Core\Generator\GeneratorInterface definition.
   *
   * @var \Drupal\Console\Core\Generator\GeneratorInterface
   */
  protected $generator;


  /**
   * Constructs a new DefaultCommand object.
   */
  public function __construct(GeneratorInterface $skeleton_module_skeleton_module_default_generator) {
    $this->generator = $skeleton_module_skeleton_module_default_generator;
    parent::__construct();
  }

  /**
   * {@inheritdoc}
   */
  protected function configure() {
    $this
      ->setName('skeleton_module:default')
      ->setDescription($this->trans('commands.skeleton_module.default.description'));
  }

  /**
   * {@inheritdoc}
   */
  protected function initialize(InputInterface $input, OutputInterface $output) {
    parent::initialize($input, $output);
    $this->getIo()->info('initialize');
  }

  /**
   * {@inheritdoc}
   */
  protected function interact(InputInterface $input, OutputInterface $output) {
    $this->getIo()->info('interact');
  }

  /**
   * {@inheritdoc}
   */
  protected function execute(InputInterface $input, OutputInterface $output) {
    $this->getIo()->info('execute');
    $this->getIo()->info($this->trans('commands.skeleton_module.default.messages.success'));
    $this->generator->generate([]);
  }

}
