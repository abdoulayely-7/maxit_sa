<?php

namespace src\service;

use app\core\App;
use app\core\Singleton;
use src\entity\User;

class SecurityService extends Singleton
{
  private $userRepository;

  protected function __construct()
  {
    $this->userRepository = App::getDependency("userRepository");
  }

  public function seConnecter(string $telephone) : null|User
  {
    return $this->userRepository->selectByTelephoenAndPassword($telephone);
  }
  public function inscrireClient(User $user): void
    {
      $this->userRepository->inscriptionTransaction($user);
    }

}
