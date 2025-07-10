<?php
namespace src\entity;

use app\core\abstract\AbstractEntity;

class Test extends AbstractEntity
{
    private int $id;
    private string $nom;
    private string $telephone;

    public function __construct(int $id = 0, string $nom = 'Inconnu', string $telephone = '0000000000')
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->telephone = $telephone;
    }

    // ✅ Méthode d'instance : transforme l'objet en tableau
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'telephone' => $this->telephone
        ];
    }

    // ✅ Méthode statique : crée un objet à partir d’un tableau
    public static function toObject(array $data): static
    {
        return new static(
            $data['id'] ?? 0,
            $data['nom'] ?? 'Inconnu',
            $data['telephone'] ?? '0000000000'
        );
    }
}
