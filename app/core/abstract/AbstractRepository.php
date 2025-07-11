<?php
namespace app\core\abstract;

use app\core\App;
use app\core\DataBase;

abstract  class AbstractRepository
{
  protected string $table ;
  protected DataBase $db;

  public function __construct()
  {
    $this->db = App::getDependency("database");
  }
  abstract public function selectByid();
}
