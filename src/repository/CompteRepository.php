<?php

namespace src\repository;

use app\core\abstract\AbstractRepository;
use src\entity\Compte;

class CompteRepository extends AbstractRepository
{
  private static $instance = null;

  protected function __construct()
  {
    parent::__construct();
    $this->table = 'compte';
  }

  public function findCompteByUserId(int $userId): ?array
  {
    $query = "
      SELECT 
        c.id AS compte_id,
        c.numero_tel,
        c.solde,
        u.id AS user_id,
        u.nom,
        u.prenom,
        u.telephone
      FROM $this->table c
      JOIN utilisateur u ON u.id = c.utilisateur_id
      WHERE u.id = :id
        AND c.typecompte = 'principal'
      LIMIT 1
    ";

    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->execute(['id' => $userId]);
    $result = $stmt->fetch();

    return $result ?: null;
  }

  public function selectByid() {}
}
