<?php

namespace src\controller;

use app\core\abstract\AbstractController;
use app\core\App;
use app\core\Validator;
use src\entity\User;
use src\enums\TypeCompte;
use src\service\CompteService;
use src\service\TransactionService;

class CompteController extends AbstractController
{

  private CompteService $compteService;
  private TransactionService $transactionService;
  public function __construct(CompteService $compteService,TransactionService $transactionService)
  {
    parent::__construct();
    $this->compteService = $compteService;
    $this->transactionService = $transactionService;
  }
  public function index()
  {
    $user = $this->session->get("user");
    $infos = $this->compteService->getCompteByUserId($user["id"]);
    $transactions = $this->transactionService->getLastTenTransactionsByUserId($user["id"]);
    if ($transactions) {
      $transactionsFormatted = array_map(function ($t) {
        $type = $t->getTypeTransaction()->name;
        return [
          'date' => $t->getDate()->format('d/m/Y à H:i'),
          'typeLabel' => ucfirst(strtolower($type)),
          'montant' => number_format($t->getMontant(), 0, '', ' ') . ' FCFA',
          'colorClass' => match ($type) {
            'RETRAIT' => 'text-red-600 font-semibold',
            'DEPOT'   => 'text-green-600 font-semibold',
            default   => 'text-gray-700',
          },
          'icon' => match ($type) {
            'RETRAIT' => '<i class="fas fa-arrow-down text-red-500"></i>',
            'DEPOT'   => '<i class="fas fa-arrow-up text-green-500"></i>',
            'PAIEMENT' => '<i class="fas fa-credit-card text-yellow-500"></i>',
            'TRANSFERT' => '<i class="fas fa-exchange-alt text-blue-500"></i>',
            default => '<i class="fas fa-question-circle text-gray-500"></i>',
          },
        ];
      }, $transactions);
    }
    $this->render(
      "solde/solde",
      [
        "infos" => $infos,
        "transactions" => $transactionsFormatted
      ]
    );
  }

  public function addcompte()
  {
    $this->render("solde/addCompte");
  }


  public function storeCompte()
  {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      extract($_POST);
      require_once '../app/config/rules.php';

      Validator::resetErreur();
      Validator::validate($_POST, $rules);

      if (!Validator::isValid()) {
        Validator::saveErrorsToSession($this->session);
        header("Location: " . WEB_URL . "/addcompte");
        exit;
      }
      $user = $this->session->get("user");
      $compte = App::get(CompteService::class);
      $compte->setNumeroTel($telephone);
      $compte->setSolde($solde);
      $compte->setTypeCompte(TypeCompte::SECONDAIRE);
      $compte->setUser(User::toObject($user));

      $compte = $this->compteService->createCompteSecondaire($compte);
      if ($compte) {
        $this->session->set("success", "Compte créé avec succès.");
        header("location:" . WEB_URL . "/listecompte");
        exit;
      } else {
        $this->session->set("error", "Échec de la création du compte.");
        header("location:" . WEB_URL . "/addcompte");
        exit;
      }
    } else {
      $this->session->set("error", "Méthode non autorisée.");
      header("location:" . WEB_URL . "/addcompte");
      exit;
    }
  }



  public function listecompte()
  {
    $user = $this->session->get("user");
    $comptes = $this->compteService->getAllCompteSecondaire($user["id"]);
    if (!$comptes) {
      $this->session->set("error", "Aucun compte secondaire trouvé.");
      header("location:" . WEB_URL . "/addcompte");
      exit;
    }

    $this->render("solde/listeCompte", [
      "comptes" => $comptes
    ]);
  }

public function activerCompte()
{
    $compteId = $_POST['compte_id'] ?? null;

    if (!$compteId || !is_numeric($compteId)) {
        // Erreur ou tentative d'accès non autorisé
        $this->session->set("error", "Compte invalide ou non spécifié.");
        header("Location: " . WEB_URL . "/listecompte");
        exit;
    }

    $this->compteService->activerCompte((int)$compteId);
    $this->session->set("success", "Compte activé avec succès.");
    header("Location: " . WEB_URL . "/listecompte");
    exit;
}



  public function create() {}
  public function login()
  {
    header("location:" . WEB_URL . "/compte");
  }
  public function store() {}
  public function show() {}
  public function destroy() {}
  public function edit() {}
}
