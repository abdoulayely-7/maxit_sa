<?php
namespace app\core;

use app\core\middlewares\Auth;
use ReflectionClass;
use Symfony\Component\Yaml\Yaml;

class App
{
    private static array $dependencies = [];

    public static function init()
    {
        $configPath = '../app/config/service.yml';
        if (file_exists($configPath)) {
            self::$dependencies = Yaml::parseFile($configPath);
        } else {
            throw new \Exception("Le fichier de configuration des dépendances est introuvable.");
        }
    }
    // ancien méthode fasçade
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


    private static array $instances = [];

    public static function get(string $class)
    {
        // Si déjà instancié (singleton), on retourne l’instance
        if (isset(self::$instances[$class])) {
            return self::$instances[$class];
        }

        // Si c’est un Singleton, on l’instancie UNE fois seulement
        if (is_subclass_of($class, Singleton::class)) {
            $instance = self::resolve($class);
            self::$instances[$class] = $instance;
            return $instance;
        }

        // Sinon, on résout et retourne une nouvelle instance (non singleton)
        return self::resolve($class);
    }

    private static function resolve(string $class)
    {
        $reflector = new \ReflectionClass($class);

        // Pas de constructeur → on instancie directement
        if (!$reflector->getConstructor()) {
            return new $class();
        }

        // Injection des dépendances par constructeur
        $dependencies = [];
        foreach ($reflector->getConstructor()->getParameters() as $param) {
            $type = $param->getType()?->getName();
            if ($type === null) {
                throw new \Exception("Dépendance non typée : {$param->getName()} dans {$class}");
            }
            $dependencies[] = self::get($type); // Appel récursif
        }

        return $reflector->newInstanceArgs($dependencies);
    }
}