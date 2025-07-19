<?php

namespace src\service;

use app\core\App;
use app\core\Singleton;
use src\entity\Compte;

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

  public function createCompteSecondaire(Compte $compte): void
  {
    $this->compteRepository->createCompteSecondaire($compte);
  }
  public function getAllCompteSecondaire(int $userId): array
  {
    return $this->compteRepository->getAllCompteSecondaire($userId);
  }
}
