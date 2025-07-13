<?php
namespace app\core;

use app\core\middlewares\Auth;
use src\repository\CompteRepository;
use src\repository\ProfilRepository;
use src\repository\TransactionRepository;
use src\repository\UtilisateurRepository;
use src\service\CompteService;
use src\service\ProfilService as ServiceProfilService;
use src\service\SecurityService;
use src\service\TransactionService;

class App
{
    private static array $dependencies = [];

    public static function init()
    {
        self::$dependencies = [
            "core" => [
                "database" => DataBase::class,
                "session" => Session::class,
                "auth" => Auth::class,
            ],
            "service" => [
                "securityService" => SecurityService::class,
                "compteService" => CompteService::class,
                "transactionService" => TransactionService::class,
                "profilService" => ServiceProfilService::class,
            ],
            "repository" => [
                "userRepository" => UtilisateurRepository::class,
                "compteRepository" => CompteRepository::class,
                "transactionRepository" => TransactionRepository::class,
                "profilRepository" => ProfilRepository::class,
            ],
        ];
    }

public static function getDependency(string $dep)
{
    if (empty(self::$dependencies)) {
        self::init();
    }
    foreach (self::$dependencies as $category) {
        if (is_array($category) && isset($category[$dep])) {
            $class = $category[$dep];
            if (method_exists($class, 'getInstance')) {
                return $class::getInstance();
            }
            return new $class();
        }
    }
    return null;
}
}