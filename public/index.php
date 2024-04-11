<?php
use Cosanpa\Src\Router;

require_once __DIR__ . "/../vendor/autoload.php";

date_default_timezone_set('America/Belem');
session_start();

$rotas = require_once __DIR__ . "/../config/rotas.php";
$app = new Router($rotas);
$app->run();

unset($_SESSION['notificacao']);
