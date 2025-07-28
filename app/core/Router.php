<?php

namespace app\core;

use app\core\Container;

class Router
{
  public static function resolve(array $tabs)
  {
    $uri = $_SERVER["REQUEST_URI"];
    if (array_key_exists($uri, $tabs)) {
      $controllerName = $tabs[$uri]['controller'];
      $action = $tabs[$uri]['action'];
      $middlewares = require '../app/config/middlewares.php';
      $middlewareName = $tabs[$uri]['middleware'] ?? null;

      if (isset($middlewares[$middlewareName])) {
        $middlewareClass = $middlewares[$middlewareName];
        $middleware = new $middlewareClass();
        $middleware();
      }

      // ✅ Utilise ta méthode App::get() pour gérer l'injection de dépendance
      $controller = App::get($controllerName);
      $controller->$action();
    } else {
      var_dump("Erreur : route non trouvée");
      die;
    }
  }
}
