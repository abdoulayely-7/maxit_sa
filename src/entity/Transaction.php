<?php
namespace src\entity;

use src\enums\TypeTransaction;

class Transaction
{
    private int $id;
    private \DateTime $date;
    private TypeTransaction $typeTransaction;
    private float $montant;
    private Compte $compte ;

    public function __construct(int $id=0,\DateTime $date,TypeTransaction $typeTransaction,float $montant) {
        $this->id = $id;
        $this->date = $date;
        $this->typeTransaction = $typeTransaction;
        $this->montant = $montant;
        $this->compte = new Compte();
    }

    public function getId(): int {
        return $this->id; 
    }
    public function getDate(): \DateTime { 
        return $this->date; 
    }
    public function setDate(\DateTime $date): void { 
        $this->date = $date; 
    }

    public function getCompte(): Compte { 
        return $this->compte; 
    }
    public function setCompte(Compte $compte): void { 
        $this->compte = $compte; 
    }
    
    public function getTypeTransaction(): TypeTransaction { 
        return $this->typeTransaction; 
    }
    public function setTypeTransaction(TypeTransaction $typeTransaction): void { 
        $this->typeTransaction = $typeTransaction; 
    }

    public function getMontant(): float { 
        return $this->montant; 
    }
    public function setMontant(float $montant): void { 
        $this->montant = $montant; 
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'date' => $this->date->format('Y-m-d H:i:s'),
            'typetransaction' => $this->typeTransaction->value,
            'montant' => $this->montant,
            'compte'=> $this->compte->toArray()
        ];
    }

    public static function toObject(array $data): self
    {
        $transaction = new self(
            $data['id'],
            new \DateTime($data['date']),
            TypeTransaction::from($data['typetransaction']),
            (float)$data['montant'],
            
        );
        if (isset($data['compte']) && is_array($data['compte'])) {
            $transaction -> setCompte(Compte::toObject($data['compte']));
        }
        return $transaction;
    }
} 