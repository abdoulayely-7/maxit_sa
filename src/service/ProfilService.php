<?php
namespace src\service;
use app\core\App;
use app\core\Singleton;
use src\entity\Profil;
use src\repository\ProfilRepository;

class ProfilService extends Singleton
{
  private ProfilRepository $profilRepository;
  public function __construct(ProfilRepository $profilRepository)
  {
    $this->profilRepository = $profilRepository;
  }

  public function getProfilByLibelle(string $libelle): ?Profil
  {
    return $this->profilRepository->findProfilLibelle($libelle);
  }
}
