<?php

namespace Cosanpa\PortalGlpi;

class Router
{
    /*Array que receberá todas as rotas com suas respectivas informações, Controller e Action.
    Exemplo: ['/users'] => ['controller' => 'UserController', 'action' => 'users']*/
    private array $rotas = [];

    function __construct($rotas)
    {
        $this->rotas = $rotas;
    }

    /*Função recupera a rota informada, se existir*/
    protected function getInfoRota($rota, $method): array
    {
        if (!isset($this->rotas[$rota][$method])) {
            Util::redireciona('/error404');
            exit();
        }
        return $this->rotas[$rota][$method];
    }

    public function handler()
    {
        $rota_acessada = explode("?", $_SERVER["REQUEST_URI"]);
        if (is_array($rota_acessada)) {
            $rota_acessada = $rota_acessada[0];
        }
        $method = $_SERVER['REQUEST_METHOD'];
        if (strlen($rota_acessada) > 1) $rota_acessada = rtrim($rota_acessada, '/');
        $infoRota = $this->getInfoRota($rota_acessada, $method);
        $controller = new $infoRota['controller'];
        $action = $infoRota['action'];
        $controller->$action(3);
    }
}
