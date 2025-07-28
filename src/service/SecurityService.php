<?php

namespace src\service;

use app\core\App;
use app\core\Singleton;
use src\entity\User;
use src\repository\UtilisateurRepository;

class SecurityService extends Singleton
{
  private UtilisateurRepository $userRepository;

  public function __construct(UtilisateurRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function seConnecter(string $telephone): null|User
  {
    return $this->userRepository->selectByTelephoenAndPassword($telephone);
  }
  public function inscrireClient(User $user): void
  {
    $this->userRepository->inscriptionTransaction($user);
  }
}
