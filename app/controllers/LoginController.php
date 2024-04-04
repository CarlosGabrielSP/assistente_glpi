<?php 
namespace Cosanpa\App\controllers;

use Psr\Http\Message\ServerRequestInterface;
use Cosanpa\App\services\UserService;
use Cosanpa\Src\Controller;
use Cosanpa\Src\Helper;

class LoginController extends Controller
{
    public function logar(ServerRequestInterface $request): array
    {
        $params = filter_var_array($request->getParsedBody(),FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if(!(new UserService())->login($params['nome'])){
            Helper::notificacao('error','<strong>Usuário não encontrado!</strong> Verifique o usuário digitado ou ligue para o número 3202-8541/8551');
        }
        $partResponse['body'] = $this->renderView(view:"index");
        return $partResponse;
    }

    public function deslogar(): array
    {
        (new UserService)->logoff();
        return Helper::redireciona('/');
    }
}