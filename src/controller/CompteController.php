<?php
namespace src\controller;
use app\core\abstract\AbstractController;
use app\core\App;

class CompteController extends AbstractController{

  private $compteService;
  public function __construct()
  {
    parent::__construct();
    $this->compteService=App::getDependency("compteService");
  }
  public function index() {
    $user = $this->session-> get("user");
    $infos= $this->compteService->getCompteByUserId($user["id"]);
    $this->render("solde/solde",
    [ "infos" => $infos]);

  }

  public function create() {
  }
  public function login(){
    header("location:".WEB_URL."/solde");
  }
  public function store() {}
  public function show() {}
  public function destroy() {}
  public function edit() {}

}