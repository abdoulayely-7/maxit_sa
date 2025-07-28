<?php

namespace src\service;

use app\core\App;
use app\core\Singleton;
use src\entity\Compte;
use src\repository\CompteRepository;

class CompteService extends Singleton
{
  private CompteRepository $compteRepository;

  public function __construct(CompteRepository $compteRepository)
  {
    $this->compteRepository = $compteRepository;
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

  public function findById(int $compteId): ?array
{
    return $this->compteRepository->findById($compteId);
}

public function activerCompte(int $compteId): void
{
    $this->compteRepository->activerCompte($compteId);
}


}
