<?php

namespace src\repository;

use app\core\abstract\AbstractRepository;
use src\entity\Compte;
use src\enums\TypeCompte;

class CompteRepository extends AbstractRepository
{
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
  public function getAllCompteSecondaire(int $userId): array
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
      WHERE u.id = :userId
        AND c.typecompte = 'secondaire'
    ";

    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->execute(['userId' => $userId]);
    return $stmt->fetchAll() ?: [];
  }

  public function selectByid() {}

  public function createCompteSecondaire(Compte $compte): void
  {
    $query = "
      INSERT INTO $this->table (solde, numero_tel, typecompte, utilisateur_id)
      VALUES (:solde, :numero_tel, :typecompte, :utilisateur_id)
    ";

    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->execute([
      'solde' => $compte->getSolde(),
      'numero_tel' => $compte->getNumeroTel(),
      'typecompte' => TypeCompte::SECONDAIRE->value,
      'utilisateur_id' => $compte->getUser()->getId()
    ]);
  }
}
