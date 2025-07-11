<?php

namespace app\core\middlewares;

use app\core\App;

class Auth
{
  public function __invoke()
  {
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    $session = App::getDependency('session');
    if (!$session->isset('user')) {
      header("location:" . WEB_URL);
      exit;
    }
  }
}
