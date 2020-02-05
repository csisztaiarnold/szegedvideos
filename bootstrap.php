<?php

ini_set('error_reporting', ~E_DEPRECATED);
require_once __DIR__ . '/vendor/autoload.php';

$settings = parse_ini_file('.env');

$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection([
    'driver' => $settings['DB_DRIVER'],
    'host' => $settings['DB_HOST'],
    'database' => $settings['DB_DATABASE'],
    'username' => $settings['DB_USER'],
    'password' => $settings['DB_PASSWORD'],
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_general_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
