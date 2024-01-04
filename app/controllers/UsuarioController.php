<?php
namespace Cosanpa\App\controllers;

use Cosanpa\App\services\UserService;
use Cosanpa\Src\Controller;

class UsuarioController extends Controller
{
    private UserService $userServico;

    function __construct(){
        $this->userServico = new UserService;
    }

    public function pesquisaUsuario()//Usado na pesquisa de usuário via AJAX 
    {
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($this->userServico->buscaUsuario($usuario)) {
            echo '1';
        } else {
            echo '0';
        }
    }
}
