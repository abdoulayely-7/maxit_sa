<?php
namespace src\service;
use app\core\App;
use app\core\Singleton;
use src\entity\Profil;

class ProfilService extends Singleton
{
  private $profilRepository;
  protected function __construct()
  {
    $this->profilRepository = App::getDependency("profilRepository");
  }

  public function getProfilByLibelle(string $libelle): ?Profil
  {
    return $this->profilRepository->findProfilLibelle($libelle);
  }
}
