<?php
namespace Cosanpa\Src;

use Laminas\Diactoros\ResponseFactory;
use Laminas\Diactoros\StreamFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

abstract class Controller implements RequestHandlerInterface
{
    use \Cosanpa\Src\Template;

    /**
     * A propriedade partResponse deve obedecer seguinte estrutura:
     * Ex.:
     *  $partResponse['status'] = '200'
     *  $partResponse['header'] = ['Content-type'=>'text/html; charset=utf-8',...]
     *  $partResponse['body'] = 'Corpo da resposta';
    */

    function __construct(protected string $action){}

    public function handle(ServerRequestInterface $request): ResponseInterface 
    {
        $partResponse = $this->{$this->action}($request);

        $status = $partResponse['status'] ?? 200;
        $header = $partResponse['header'] ?? array(['Content-Type' => 'text/html']);
        $body = (new StreamFactory)->createStream($partResponse['body'] ?? '');
        
        $responseFactory = new ResponseFactory();
        $response = $responseFactory->createResponse($status);
        foreach ($header as $key => $value) {
            $response = $response->withHeader($key, $value);
        }

        return $response->withBody($body);
    }

    // Refatorar
    public function downloadPDF(string $file)
    {
        $path = "../public/file/$file.pdf";
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="'.$file.'.pdf"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: '.filesize($path));
        readfile($path);
    }
}
