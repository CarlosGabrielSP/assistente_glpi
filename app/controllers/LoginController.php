<?php 
namespace Cosanpa\App\controllers;

use Psr\Http\Message\ServerRequestInterface;
use Cosanpa\App\services\UserService;
use Cosanpa\Src\Controller;
use Cosanpa\Src\Util;

class LoginController extends Controller
{
    public function logar(ServerRequestInterface $request): array
    {
        $params = filter_var_array($request->getParsedBody(),FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if(!(new UserService())->login($params['nome'])){
            Util::notificacao('error','<strong>Usuário não encontrado!</strong> Verifique o usuário digitado ou ligue para o número 3202-8541/8551');
        }
        return Util::redireciona('/');
    }

    public function deslogar(): array
    {
        (new UserService)->logoff();
        return Util::redireciona('/');
    }
}