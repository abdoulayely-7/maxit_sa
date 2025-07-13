<?php
namespace src\repository;
use app\core\abstract\AbstractRepository;
use src\entity\Transaction;

class TransactionRepository extends AbstractRepository{

  protected function __construct()
  {
    parent::__construct();
    $this->table = 'transaction';
  }

  public function findLastTenTransactionsByUserId(int $userId): ?array
  {
    $query = "
      select t.*
      from $this->table t
      join compte c on c.id = t.compte_id
      where c.utilisateur_id = :userId
      order by t.date desc
      limit 10
    ";

    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->execute(['userId' => $userId]);
    $results = $stmt->fetchAll();

    return $results ? array_map(fn($row) => Transaction::toObject($row), $results) : null;
  }
  public function selectById() {

  }
}