<?php

namespace src\service;

use app\core\App;
use app\core\Singleton;

class CompteService extends Singleton
{
  private $compteRepository;
  protected function __construct()
  {
    $this->compteRepository = App::getDependency("compteRepository");
  }

  public function getCompteByUserId(int $userId): ?array
  {
    return $this->compteRepository->findCompteByUserId($userId);
  }
}
