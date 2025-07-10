<?php

namespace src\controller;

use app\core\abstract\AbstractController;

class SecurityController extends AbstractController
{

  public function __construct()
  {
    $this->layout = 'nolayout.html.php';
    
  }
  public function index()
  {
  }
  public function create() {
    $this->render("auth/signIn");
  }
  public function formSignUp()
  {
    $this->render("auth/signUp");;
  }
  public function login(){
    header("location:".WEB_URL."/solde");
  }
  public function store() {}
  public function show() {}
  public function destroy() {}
  public function edit() {}
}
