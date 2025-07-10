<?php
namespace src\controller;
use app\core\abstract\AbstractController;

class CompteController extends AbstractController{
  public function index() {}

  public function create() {
    $this->render("solde/solde");
  }
  public function login(){
    header("location:".WEB_URL."/solde");
  }
  public function store() {}
  public function show() {}
  public function destroy() {}
  public function edit() {}

}