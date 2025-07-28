<?php

namespace app\core;

use ReflectionClass;

class Container {
    public static function get(string $class) {
        // Cas des classes qui héritent de Singleton
        if (is_subclass_of($class, Singleton::class)) {
            return $class::getInstance();
        }

        $reflector = new ReflectionClass($class);

        $constructor = $reflector->getConstructor();
        if (!$constructor) {
            return new $class();
        }

        $dependencies = [];
        foreach ($constructor->getParameters() as $param) {
            $type = $param->getType()?->getName();
            if ($type) {
                if ($type === DataBase::class) {
                    $dependencies[] = DataBase::getInstance();
                } else {
                    $dependencies[] = self::get($type);
                }
            }
        }

        return $reflector->newInstanceArgs($dependencies);
    }
}
