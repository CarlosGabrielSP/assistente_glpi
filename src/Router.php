<?php
namespace Cosanpa\Src;

use Laminas\Diactoros\ServerRequestFactory;

class Router
{
    function __construct(private array $rotas){}

    public function run(): void
    {
        $request = ServerRequestFactory::fromGlobals();

        $uri = $request->getUri()->getPath();
        $method = $request->getMethod();
        $infoRota = $this->validaRota($uri, $method);
        
        $action = $infoRota['action'];
        $controller = new $infoRota['controller']($action);

        $response = $controller->handle($request);

        foreach ($response->getHeaders() as $name => $values) {
            foreach ($values as $value) {
                header(sprintf('%s: %s', $name, $value), false);
            }
        }

        http_response_code($response->getStatusCode());
        echo $response->getBody();
    }

    public function validaRota($uri, $method): array
    {
        if (!isset($this->rotas[$uri][$method])){
            return $this->rotas['/404']['GET'];
        }
        if (isset($this->rotas[$uri][$method]['auth'])){
            if (!$_SESSION['user']['name'] ?? false){
                Helper::notificacao('error', 'Usuário não informado');
                return $this->rotas['/404']['GET'];
            }
        }
        return $this->rotas[$uri][$method];
    }
}
