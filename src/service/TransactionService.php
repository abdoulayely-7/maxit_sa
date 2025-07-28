<?php
namespace src\service;
use app\core\App;
use app\core\Singleton;
use src\repository\TransactionRepository;

class TransactionService extends Singleton
{
  private TransactionRepository $transactionRepository;

  public function __construct(TransactionRepository $transactionRepository)
  {
    $this->transactionRepository = $transactionRepository;
  }

  public function getLastTenTransactionsByUserId(int $userId): ?array
  {
    return $this->transactionRepository->findLastTenTransactionsByUserId($userId);
  }
}
