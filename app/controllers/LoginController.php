<?php 

namespace App\controllers;

use App\services\UserService;
use Cosanpa\PortalGlpi\Controller;
use Cosanpa\PortalGlpi\Util;

class LoginController extends Controller
{
    public function logar(){
        $nome = htmlspecialchars($_POST['nome']);

        $login = (new UserService)->login($nome);
        if(!$login[0]) {
            Util::notificacao('error',$login[1]);
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