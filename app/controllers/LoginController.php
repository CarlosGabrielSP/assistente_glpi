<?php 
namespace Cosanpa\App\controllers;

use Cosanpa\App\services\UserService;
use Cosanpa\Src\Controller;
use Cosanpa\Src\Util;

class LoginController extends Controller
{
    public function logar(): void
    {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if(!(new UserService)->login($nome)){
            Util::notificacao('error','<strong>Usuário não encontrado!</strong> Verifique o usuário digitado ou ligue para o número 3202-8541/8551');
        }
        Util::redireciona('/');
    }

    public function deslogar(): void
    {
        (new UserService)->logoff();
        Util::redireciona('/');
    }
}