<?php

namespace App\controllers;

use App\services\UserService;
use Cosanpa\PortalGlpi\Controller;

class UsuarioController extends Controller
{
    private $userServico;

    function __construct()
    {
        $this->userServico = new UserService;
    }

    public function pesquisaUsuario()//Usado na pesquisa de usuário via AJAX 
    {
        if($this->userServico->buscaUsuario($_POST['usuario'])) {
            echo '1';
        } else {
            echo '0';
        }
    }
}
