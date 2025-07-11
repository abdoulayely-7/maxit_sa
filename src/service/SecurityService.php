<?php

namespace src\service;

use app\core\App;
use src\entity\User;

class SecurityService
{
  private static $instance = null;
  private $userRepository;

  private function __construct()
  {
    $this->userRepository = App::getDependency("userRepository");
  }

  public function seConnecter(string $telephone, string $password) : null|User
  {
    $resultat = $this->userRepository->selectByTelephoenAndPassword($telephone, $password);
    return $resultat;
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new SecurityService();
    }
    return self::$instance;
  }
}
