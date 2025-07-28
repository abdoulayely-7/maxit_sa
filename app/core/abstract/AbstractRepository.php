<?php
namespace app\core\abstract;

use app\core\App;
use app\core\DataBase;
use app\core\Singleton;
use PDO;

abstract  class AbstractRepository extends Singleton
{
  protected string $table ;
  protected \PDO $db;


  public function __construct()
  {
    $this->db = DataBase::getInstance()->getConnection();
  }
  abstract public function selectByid();
}
