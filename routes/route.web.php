<?php

use src\controller\CompteController;
use src\controller\SecurityController;

$tabs = [
  '/' => ['controller' => SecurityController::class, 'action' => 'create'],
  '/signin' => ['controller' => SecurityController::class, 'action' => 'login'],
  '/signup' => ['controller' => SecurityController::class, 'action' => 'formSignUp'],
  '/dosignup' => ['controller' => SecurityController::class, 'action' => 'store', 'middleware' => 'crypPassword'],
  '/logout' => ['controller' => SecurityController::class, 'action' => 'logout'],
  '/compte' => ['controller' => CompteController::class, 'action' => 'index', 'middleware' => 'auth'],
  '/listecompte' => ['controller' => CompteController::class, 'action' => 'listeCompte', 'middleware' => 'auth'],
  '/addcompte' => ['controller' => CompteController::class, 'action' => 'addcompte', 'middleware' => 'auth'],
  '/doaddcompte' => ['controller' => CompteController::class, 'action' => 'storeCompte', 'middleware' => 'auth'],
  '/activercompte' => ['controller' => CompteController::class, 'action' => 'activerCompte', 'middleware' => 'auth'],


];
