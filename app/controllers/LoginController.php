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

        $login = (new UserService)->login($nome, $senha);
        if(!$login[0]) {
            Util::notificacao('erro',$login[1]);
            if($login[2]) {
                Util::redireciona('/',['usr' => $login[2]]);
            }
        }
        Util::redireciona('/');
    }

    public function deslogar(){
        (new UserService)->logoff();
        Util::redireciona('/');
    }
}