<?php

namespace src\repository;

use app\core\abstract\AbstractRepository;
use app\core\DataBase;
use src\entity\Profil;

class ProfilRepository extends AbstractRepository
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'profil';
  }

  public function findProfilLibelle(string $libelle): ?Profil
  {
    $query = "SELECT * FROM $this->table WHERE libelle = :libelle";
    $stmt = $this->db->prepare($query);
    $stmt->execute(['libelle' => $libelle]);
    $result = $stmt->fetch();
    return $result ? Profil::toObject($result) : null;
  }

  public function selectById() {}
}
