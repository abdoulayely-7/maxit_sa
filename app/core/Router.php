<?php
namespace app\core;
class Router{
  public static function resolve(array $tabs){
    $uri = $_SERVER["REQUEST_URI"];
    if (array_key_exists($uri,$tabs)) {
      $controllerName = $tabs[$uri]['controller'];
      $action = $tabs[$uri]['action'];
      $controller = new $controllerName();
      $controller -> $action();
    }else{
      var_dump("erreur");die;
    }
  }
}