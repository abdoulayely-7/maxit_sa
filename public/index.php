<?php

use app\core\App;
use app\core\Router;

require_once '../app/config/bootstrap.php';
Router::resolve($tabs);

// if (App::getDependency("database") != null) {
//   echo 'ok';
// }else {
//   echo 'faux';
  
// }