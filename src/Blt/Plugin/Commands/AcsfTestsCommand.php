<?php

namespace Acquia\BltAcsf\Blt\Plugin\Commands;

use Acquia\Blt\Robo\BltTasks;
use Acquia\Blt\Robo\Exceptions\BltException;

/**
 * Defines commands in the "tests:acsf:*" namespace.
 */
class AcsfTestsCommand extends BltTasks {

  /**
   * Executes the acsf-init-validate command.
   *
   * @command validate:acsf
   */
  public function validateAcsf() {
    $this->say("Validating ACSF settings...");
    $task = $this->taskDrush()
      ->stopOnFail()
      ->drush("--include=modules/contrib/acsf/acsf_init acsf-init-verify");
    $result = $task->run();
    if (!$result->wasSuccessful()) {
      throw new BltException("Failed to verify ACSF settings. Re-run acsf-init and commit the results.");
    }
  }

}
