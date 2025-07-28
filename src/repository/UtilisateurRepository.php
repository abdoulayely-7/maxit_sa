<?php

namespace src\repository;

use app\core\abstract\AbstractRepository;
use app\core\App;
use app\core\DataBase;
use src\entity\User;
use src\enums\TypeCompte;

class UtilisateurRepository extends AbstractRepository
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'utilisateur';
  }

  public function selectByTelephoenAndPassword(string $telephone): null|User
  {
    $query = "SELECT * FROM $this->table  WHERE telephone = :telephone";
    $stmt = $this->db->prepare($query);
    $stmt->execute([
      "telephone" => $telephone,
    ]);
    $result = $stmt->fetch();
    return $result ? User::toObject($result) : null;
  }


    public function existByTelephone(string $telephone): bool {
      $stmt = $this->db->prepare("SELECT id FROM utilisateur WHERE telephone = :telephone");
      $stmt->execute(['telephone' => $telephone]);
      return $stmt->fetch() !== false;
  }

  public function existByCni(string $cni): bool {
      $stmt = $this->db->prepare("SELECT id FROM utilisateur WHERE cni = :cni");
      $stmt->execute(['cni' => $cni]);
      return $stmt->fetch() !== false;
  }



  public function inscriptionTransaction(User $user): void
  {
    try {
      $this->db->beginTransaction();

      $stmtUser = $this->db->prepare("
                INSERT INTO $this->table (nom, prenom, telephone, password, adresse, cni, photoRecto, photoVerso, profil_id)
                VALUES (:nom, :prenom, :telephone, :password, :adresse, :cni, :photoRecto, :photoVerso, :profil_id)
            ");

      $stmtUser->execute([
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom(),
        'telephone' => $user->getTelephone(),
        'password' => $user->getPassword(),
        'adresse' => $user->getAdresse(),
        'cni' => $user->getCni(),
        'photoRecto' => $user->getPhotoRecto(),
        'photoVerso' => $user->getPhotoVerso(),
        'profil_id' => $user->getProfil()->getId(),
        
      ]);

      $userId = (int) $this->db->lastInsertId();
      $user->setId($userId);

      // Insertion compte principal
      $stmtCompte = $this->db->prepare("
                INSERT INTO compte (solde, numero_tel, typecompte, utilisateur_id)
                VALUES (:solde, :numero_tel, :typecompte, :utilisateur_id)
            ");

      $stmtCompte->execute([
        'solde' => 0,
        'numero_tel' => $user->getTelephone(),
        'typecompte' => TypeCompte::PRINCIPALE->value,
        'utilisateur_id' => $userId
      ]);

      $this->db->commit();
    } catch (\PDOException $e) {
      $this->db->rollBack();
      throw new \Exception("Erreur lors de l'inscription : " . $e->getMessage());
    }
  }

  public function selectByid() {}
}
