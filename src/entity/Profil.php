<?php
namespace src\entity;

use app\core\abstract\AbstractEntity;

class Profil extends AbstractEntity{
  private int $id;
  private string $libelle;
  private array $users;

  public function __construct(int $id=0,string $libelle="client")
  {
    $this->id=$id;
    $this->libelle=$libelle;
    $this->users=[];
  }

  /**
   * Get the value of id
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * Set the value of id
   */
  public function setId(int $id): self
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of libelle
   */
  public function getLibelle(): string
  {
    return $this->libelle;
  }

  /**
   * Set the value of libelle
   */
  public function setLibelle(string $libelle): self
  {
    $this->libelle = $libelle;

    return $this;
  }

  /**
   * Get the value of user
   */
  public function getUser(): array
  {
    return $this->users;
  }

  /**
   * Set the value of user
   */
  public function addUser(User $user): self
  {
    $this->users[] = $user;

    return $this;
  }
  public function toArray(): array
  {
    return [
      "id" => $this->id,
      "libelle" => $this->libelle,
      "users" => array_map(fn($u) => $u -> toArray(),$this->users)
    ];
  }
  public static function toObject(array $data): static
  {
    $profil = new self(
      $data["id"],
      $data["libelle"],
    );
    if (isset($data["users"]) && is_array($data["users"])) {
      array_map(fn($u) => $profil -> addUser($u),
    $data["users"]);
    }
    return $profil;
  }
}