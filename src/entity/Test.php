<?php
// test.php à la racine
require_once __DIR__ .  '/../../vendor/autoload.php';

use src\service\SecurityService;

$service = SecurityService::getInstance();
echo "Autoload OK";
