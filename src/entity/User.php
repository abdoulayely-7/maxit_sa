<?php

namespace src\entity;

use app\core\abstract\AbstractEntity;
use src\entity\TypeUser;

class User extends AbstractEntity
{
  private int $id ;
  private string $nom;
  private string $prenom;
  private string $telephone;
  private string $password;
  private string $cni;
  private string $photoRecto;
  private string $photoVerso;
  private string $adresse;
  private Profil $profil;
  private array $comptes;

  public function __construct(int $id=0,string $nom='',string $prenom='',string $telephone='',string $password='',string $cni='',string $adresse='',string $photoRecto='' ,string $photoVerso=''
  ) {$this->id=$id;$this->nom = $nom;$this->prenom = $prenom;$this->telephone = $telephone;$this->password = $password;$this->cni = $cni;$this->adresse = $adresse;$this->profil = new Profil();$this->photoRecto = $photoRecto;$this->photoVerso = $photoVerso;$this->comptes = [];
  }

  public function getId(): ?int
  {
    return $this->id;
  }
    public function setId(int $id): void
  {
    $this->id = $id;
  }
  public function getNom(): string
  {
    return $this->nom;
  }
  public function setNom(string $nom): void
  {
    $this->nom = $nom;
  }

  public function getPrenom(): string
  {
    return $this->prenom;
  }
  public function setPrenom(string $prenom): void
  {
    $this->prenom = $prenom;
  }

  public function getTelephone(): string
  {
    return $this->telephone;
  }
  public function setTelephone(string $telephone): void
  {
    $this->telephone = $telephone;
  }

  public function getPassword(): string
  {
    return $this->password;
  }
  public function setPassword(string $password): void
  {
    $this->password = $password;
  }

  public function getCni(): string
  {
    return $this->cni;
  }
  public function setCni(string $cni): void
  {
    $this->cni = $cni;
  }

  public function getPhotoRecto(): string
  {
    return $this->photoRecto;
  }
  public function setPhotoRecto(string $photoRecto): void
  {
    $this->photoRecto = $photoRecto;
  }

  public function getPhotoVerso(): string
  {
    return $this->photoVerso;
  }
  public function setPhotoVerso(string $photoVerso): void
  {
    $this->photoVerso = $photoVerso;
  }

  public function getAdresse(): string
  {
    return $this->adresse;
  }
  public function setAdresse(string $adresse): void
  {
    $this->adresse = $adresse;
  }

  public function getProfil(): Profil
  {
    return $this->profil;
  }
  public function setProfil(Profil $profil): void
  {
    $this->profil = $profil;
  }
  public function getComptes(): array
  {
    return $this->comptes;
  }
  public function addCompte(Compte $compte): void
  {
    $this->comptes[] = $compte;
  }


  public function toArray(): array
  {
    return [
      'id' => $this->id,
      'nom' => $this->nom,
      'prenom' => $this->prenom,
      'telephone' => $this->telephone,
      'password' => $this->password,
      'cni' => $this->cni,
      'photoRecto' => $this->photoRecto,
      'photoVerso' => $this->photoVerso,
      'adresse' => $this->adresse,
      'profil' => $this->profil->toArray(),
      'comptes' => array_map(fn($compte) => $compte->toArray(), $this->comptes),
    ];
  }

  public static function toObject(array $data): static
  {
    $user= new self(
      $data['id'],
      $data['nom'],
      $data['prenom'],
      $data['telephone'],  
      $data['password'],
      $data['cni'],
      $data['adresse'],
      $data['photorecto'] ?? '',
      $data['photoverso'] ?? '',
    );
    if (isset($data["profil"]) && is_array($data["profil"])){
      $user -> setProfil(Profil::toObject($data["profil"]));
    }
    if (isset($data["comptes"]) && is_array($data["comptes"])) {
      array_map(
        fn($c) => $user->addCompte(Compte::toObject($c)),
        $data["comptes"]
      );
    }

    return $user;
  }
}
