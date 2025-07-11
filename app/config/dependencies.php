<?php

use app\core\DataBase;
use src\repository\UtilisateurRepository;
use src\service\SecurityService;

return  [
      "core" => [
        "database" => DataBase::getInstance(),
      ],
      "service" => [
        "securityService" => SecurityService::getInstance()
      ],
      "repository" => [
        'userRepository' => UtilisateurRepository::getInstance(),
      ],
    ];