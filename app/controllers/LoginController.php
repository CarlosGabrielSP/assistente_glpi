<?php 

namespace App\controllers;

use App\services\UserService;
use Cosanpa\PortalGlpi\Controller;
use Cosanpa\PortalGlpi\Util;

class LoginController extends Controller
{
    public function logar(){
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $alert = ['alert'=>'Logado com sucesso'];

        if(!(new UserService)->login($nome, $senha)) {
            $alert = ['alert'=>$alert];
        }

        Util::redireciona('/',$alert);
    }

    public function deslogar(){
        (new UserService)->logoff();
        Util::notificacao('info','Desconectado');
        Util::redireciona('/');
    }
}