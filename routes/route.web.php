<?php

use src\controller\CompteController;
use src\controller\SecurityController;

$tabs = [
  '/' => ['controller' => SecurityController::class, 'action' => 'create'],
  '/signin' => ['controller' => SecurityController::class, 'action' => 'login'],
  '/signup' => ['controller' => SecurityController::class, 'action' => 'formSignUp'],
  '/logout' => ['controller' => SecurityController::class, 'action' => 'logout'],
  '/compte' => ['controller' => CompteController::class, 'action' => 'index', 'middleware' => 'auth'],

];
