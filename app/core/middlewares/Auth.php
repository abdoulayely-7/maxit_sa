<?php

namespace app\core\middlewares;

use app\core\App;
use app\core\Session;

class Auth
{
  private Session $session;
  public function __invoke()
  {
    $session = App::get(Session::class);
    if (!$session->isset('user')) {
      header("location:" . WEB_URL);
      exit;
    }
  }
}
