<?php

namespace src\controller;

use app\core\abstract\AbstractController;
use app\core\App;

use function app\config\dd;

class SecurityController extends AbstractController
{
  private $securityService;

  public function __construct()
  {
    parent::__construct();
    $this->layout = 'nolayout.html.php';
    $this->securityService = App::getDependency("securityService");
  }
  public function index() {}
  public function create()
  {
    $this->render("auth/signIn");
  }
  public function formSignUp()
  {
    $this->render("auth/signUp");;
  }
  public function login()
  {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      extract($_POST);
      $user = $this->securityService->seConnecter($telephone, $password);
      if ($user) {
        $this->session->set('user', $user->toArray());
        header("location:" . WEB_URL . "/solde");
        var_dump($this->session->get("user"));die;
      } else {
        var_dump($this->session->get("user"));die;

        header("location:" .  WEB_URL);
      }
    }
  }
  public function logout()
  {
    $this->session->unset('user');
    $this->session->destroy();
    header("location:" . WEB_URL);
  }
  public function store() {}
  public function show() {}
  public function destroy() {}
  public function edit() {}
}
