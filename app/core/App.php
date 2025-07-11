<?php
namespace app\core;

use app\core\middlewares\Auth;
use src\repository\UtilisateurRepository;
use src\service\SecurityService;

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
            ],
            "repository" => [
                "userRepository" => UtilisateurRepository::class,
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