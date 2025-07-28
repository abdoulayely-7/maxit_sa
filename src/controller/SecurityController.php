<?php

namespace src\controller;

use app\core\abstract\AbstractController;
use app\core\App;
use app\core\FileUpload;
use app\core\Session;
use app\core\Validator;
use src\entity\User;
use src\service\ProfilService;
use src\service\SecurityService;
use src\service\SmsService;

class SecurityController extends AbstractController
{
  private SecurityService $securityService;
  private ProfilService $profilService;
  private SmsService $smsService;

  public function __construct(
    SecurityService $securityService,
    Session $session,
    ProfilService $profilService,
    SmsService $smsService
  ) {
    parent::__construct();
    $this->layout = 'nolayout.html.php';
    $this->securityService = $securityService;
    $this->session = $session;
    $this->profilService = $profilService;
    $this->smsService = $smsService;
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
      Validator::resetErreur();
      Validator::isEmpty($telephone, "telephone");
      Validator::isTelephone($telephone, "telephone");
      Validator::isEmpty($password, "password");
      if (!Validator::isValid()) {
        Validator::saveErrorsToSession($this->session);
        header("location:" . WEB_URL);
        exit;
      }
      $user = $this->securityService->seConnecter($telephone);
      if ($user && password_verify($password, $user->getPassword())) {
        $this->session->set('user', $user->toArray());
        header("location:" . WEB_URL . "/compte");
      } else {
        Validator::addError('connexion', "Identifiants incorrects.");
        Validator::saveErrorsToSession($this->session);
        header("Location: " . WEB_URL);
        exit;
      }
    }
  }
  public function logout()
  {
    $this->session->unset('user');
    $this->session->destroy();
    header("location:" . WEB_URL);
  }
  public function store()
  {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      extract($_POST);

      require_once '../app/config/rules.php';
      Validator::resetErreur();
      Validator::validate($_POST, $rules);
      if (!Validator::isValid()) {
        Validator::saveErrorsToSession($this->session);
        //  var_dump($_POST);
        //   die("erreur");
        header("Location: " . WEB_URL . "/signup");
        exit;
      }
      $user = App::getDependency("user");
      $user->setPrenom($prenom);
      $user->setNom($nom);
      $user->setTelephone($telephone);
      $user->setPassword($password);
      $user->setAdresse($adresse);
      $user->setCni($cni);
      $user->setProfil($this->profilService->getProfilByLibelle("CLIENT"));

      if (!empty($_FILES['photorecto']['name'])) {
        $user->setPhotoRecto(FileUpload::save($_FILES['photorecto']));
      }

      if (!empty($_FILES['photoverso']['name'])) {
        $user->setPhotoVerso(FileUpload::save($_FILES['photoverso']));
      }



      $this->securityService->inscrireClient($user);
      $this->smsService->sendSms($_POST['telephone'], 'Votre compte a été créé avec succès !');
      header("Location: " . WEB_URL);
      exit;
    } else {
      var_dump($_POST);
      die("Invalid request method");
    }
  }
  public function show() {}
  public function destroy() {}
  public function edit() {}
}
