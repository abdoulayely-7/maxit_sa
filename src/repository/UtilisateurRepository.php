<?php

namespace src\repository;

use app\core\abstract\AbstractRepository;
use app\core\App;
use app\core\DataBase;
use src\entity\User;
use src\enums\TypeCompte;

class UtilisateurRepository extends AbstractRepository
{

  protected function __construct()
  {
    parent::__construct();
    $this->table = 'utilisateur';
  }

  public function selectByTelephoenAndPassword(string $telephone, string $password): null|User
  {
    $query = "SELECT * FROM $this->table  WHERE telephone = :telephone AND password = :password";
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->execute([
      "telephone" => $telephone,
      "password" => $password
    ]);
    $result = $stmt->fetch();
    if ($result) {
      return User::toObject($result);
    }
    return null;
  }

  public function inscriptionTransaction(User $user): void
  {
    try {
      $this->db->getConnection()->beginTransaction();

      $stmtUser = $this->db->getConnection()->prepare("
                INSERT INTO $this->table (nom, prenom, telephone, password, adresse, cni, photo_recto, photo_verso, profil_id)
                VALUES (:nom, :prenom, :telephone, :password, :adresse, :cni, :photo_recto, :photo_verso, :profil_id)
            ");

      $stmtUser->execute([
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom(),
        'telephone' => $user->getTelephone(),
        'password' => $user->getPassword(),
        'adresse' => $user->getAdresse(),
        'cni' => $user->getCni(),
        'photo_recto' => $user->getPhotoRecto(),
        'photo_verso' => $user->getPhotoVerso(),
        'profil_id' => $user->getProfil()->getId(),
      ]);

      $userId = (int) $this->db->getConnection()->lastInsertId();
      $user->setId($userId);

      // Insertion compte principal
      $stmtCompte = $this->db->getConnection()->prepare("
                INSERT INTO compte (solde, numero_tel, typecompte, utilisateur_id)
                VALUES (:solde, :numero_tel, :typecompte, :utilisateur_id)
            ");

      $stmtCompte->execute([
        'solde' => 0,
        'numero_tel' => $user->getTelephone(),
        'typecompte' => TypeCompte::PRINCIPALE->value,
        'utilisateur_id' => $userId
      ]);

      $this->db->getConnection()->commit();
    } catch (\PDOException $e) {
      $this->db->getConnection()->rollBack();
      throw new \Exception("Erreur lors de l'inscription : " . $e->getMessage());
    }
  }

  public function selectByid() {}
}
