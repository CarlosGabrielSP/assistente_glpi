<?php
use Cosanpa\Src\Router;

require_once __DIR__ . "/../vendor/autoload.php";

session_start();

$rotas = require_once __DIR__ . "/../config/rotas.php";
$router = new Router($rotas);
$router->handler();

unset($_SESSION['notificacao']);
