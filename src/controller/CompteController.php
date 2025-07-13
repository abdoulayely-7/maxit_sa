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
    // require_once "../app/config/helpers.php";
    // dd($transactions);
    $this->render("solde/solde",
    [ 
        "infos" => $infos,
        "transactions" => $transactions
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