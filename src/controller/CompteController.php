<?php
namespace src\controller;
use app\core\abstract\AbstractController;
use app\core\App;

class CompteController extends AbstractController{

  private $compteService;
  private $transactionService;
  public function __construct()
  {
    parent::__construct();
    $this->compteService=App::getDependency("compteService");
    $this->transactionService=App::getDependency("transactionService");
  }
  public function index() {
    $user = $this->session-> get("user");
    $infos= $this->compteService->getCompteByUserId($user["id"]);
    $transactions = $this->transactionService->getLastTenTransactionsByUserId($user["id"]);
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
    $this->render("solde/solde",
    [ 
        "infos" => $infos,
        "transactions" => $transactionsFormatted
    ]);

  }

  public function create() {
  }
  public function login(){
    header("location:".WEB_URL."/compte");
  }
  public function store() {}
  public function show() {}
  public function destroy() {}
  public function edit() {}

}