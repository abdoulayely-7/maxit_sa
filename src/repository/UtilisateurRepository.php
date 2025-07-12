<?php
namespace src\repository;
use app\core\abstract\AbstractRepository;
use app\core\App;
use app\core\DataBase;
use src\entity\User;

class UtilisateurRepository extends AbstractRepository{

  protected function __construct()
  {
    parent::__construct();
    $this->table = 'utilisateur';
  }

  public function selectByTelephoenAndPassword(string $telephone,string $password) : null|User
  {
    $query = "SELECT * FROM $this->table  WHERE telephone = :telephone AND password = :password";
    $stmt = $this->db-> getConnection()->prepare($query);
    $stmt -> execute([
        "telephone" => $telephone,
        "password" => $password
      ]);
    $result = $stmt -> fetch();
    if ($result) {
      return User::toObject($result);
    }
    return null;
  }


public function selectByid()
{
  
}


}