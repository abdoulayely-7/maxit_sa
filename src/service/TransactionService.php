<?php
namespace src\service;
use app\core\App;
use app\core\Singleton;

class TransactionService extends Singleton
{
  private $transactionRepository;

  public function __construct()
  {
    $this->transactionRepository = App::getDependency("transactionRepository");
  }

  public function getLastTenTransactionsByUserId(int $userId): ?array
  {
    return $this->transactionRepository->findLastTenTransactionsByUserId($userId);
  }
}
