<?php

namespace src\entity;

use app\core\abstract\AbstractEntity;
use src\enums\TypeCompte;

class Compte extends AbstractEntity
{
    private int $id;
    private float $solde;
    private string $numeroTel;
    private TypeCompte $typeCompte;
    private User $user;
    private array $transactions;

    public function __construct(int $id = 0, string $numeroTel = '', float $solde = 12345, TypeCompte $typeCompte = TypeCompte::PRINCIPALE)
    {
        $this->id = $id;
        $this->numeroTel = $numeroTel;
        $this->solde = $solde;
        $this->typeCompte = $typeCompte;
        $this->user = new User();
        $this->transactions = [];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getTransactions(): array
    {
        return $this->transactions;
    }

    public function addTransaction(Transaction $transaction): void
    {
        $this->transactions[] = $transaction;
    }


    public function getSolde(): float
    {
        return $this->solde;
    }
    public function setSolde(float $solde): void
    {
        $this->solde = $solde;
    }

    public function getNumeroTel(): string
    {
        return $this->numeroTel;
    }
    public function setNumeroTel(string $numeroTel): void
    {
        $this->numeroTel = $numeroTel;
    }

    public function getTypeCompte(): TypeCompte
    {
        return $this->typeCompte;
    }
    public function setTypeCompte(TypeCompte $typeCompte): void
    {
        $this->typeCompte = $typeCompte;
    }



    public  function toArray(): array
    {
        return [
            'id' => $this->id,
            'numeroTel' => $this->numeroTel,
            'solde' => $this->solde,
            'typeCompte' => $this->typeCompte->value,
            'user' => $this->user->toArray(),
            'transactions' => array_map(fn($t) => $t->toArray(), $this->transactions)
        ];
    }

    public static function toObject(array $data): self
    {
        $compte =  new self(
            $data['id'] ?? 0,
            $data['numeroTel'] ?? '',
            $data['solde'] ?? 0.0,
            TypeCompte::from($data['typeCompte']) ?? 'PRINCIPAL'
        );

        if (isset($data["user"]) && is_array($data['user'])) {
            $compte->setUser(User::toObject($data["user"]));
        }
        if (isset($data["transactions"]) && is_array($data["transactions"])) {
            array_map(
                fn($t) => $compte->addTransaction(Transaction::toObject($t)),
                $data['transactions']
            );
        }
        return $compte;
    }
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
