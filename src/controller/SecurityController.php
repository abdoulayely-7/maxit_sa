<?php

namespace src\controller;

use app\core\abstract\AbstractController;
use app\core\App;
use app\core\FileUpload;
use app\core\Validator;
use src\entity\User;

use function app\config\dd;

class SecurityController extends AbstractController
{
  private $securityService;
  private $profilService;

  public function __construct()
  {
    parent::__construct();
    $this->layout = 'nolayout.html.php';
    $this->securityService = App::getDependency("securityService");
    $this->profilService = App::getDependency("profilService");
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
      Validator::isTelephone($telephone,"telephone");
      Validator::isEmpty($password, "password");
      if (!Validator::isValid()) {
          Validator::saveErrorsToSession($this->session);
          header("location:" . WEB_URL);
          exit;
      }
      $user = $this->securityService->seConnecter($telephone, $password);
      if ($user) {
        $this->session->set('user', $user->toArray());
        header("location:" . WEB_URL . "/compte");
      } else {
          Validator::addError('connexion', "Identifiants incorrects.");
          Validator::saveErrorsToSession($this->session);
          header("Location: " . WEB_URL );
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
  public function store() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);

            // Validator::resetErreur();
            // Validator::isEmpty($prenom, "prenom");
            // Validator::isEmpty($nom, "nom");
            // Validator::isTelephone($telephone, "telephone");
            // Validator::isEmpty($adresse, "adresse");
            // Validator::isEmpty($cni, "cni");

            // if (!Validator::isValid()) {
            //     Validator::saveErrorsToSession($this->session);
            //     header("Location: " . WEB_URL . "/signup");
            //     exit;
            // }

            $user = new User();
            $user->setPrenom($prenom);
            $user->setNom($nom);
            $user->setTelephone($telephone);
            $user->setPassword($password);
            $user->setAdresse($adresse);
            $user->setCni($cni);
            $user->setProfil($this->profilService->getProfilByLibelle("CLIENT"));

            if (!empty($_FILES['photo_recto']['name'])) {
                $user->setPhotoRecto(FileUpload::save($_FILES['photo_recto']));
            }

            if (!empty($_FILES['photo_verso']['name'])) {
                $user->setPhotoVerso(FileUpload::save($_FILES['photo_verso']));
            }

            $this->securityService->inscrireClient($user);

            header("Location: " . WEB_URL );
            exit;
        }
        else {
          var_dump($_POST);
          die("Invalid request method");
        }
    
  }
  public function show() {}
  public function destroy() {}
  public function edit() {}
}
