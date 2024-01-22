<?php
namespace Cosanpa\App\controllers;

use Cosanpa\Src\Controller;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class AppController extends Controller
{
    public function index()
    {
        echo (new Response(
                status:200,
                body:$this->renderView(view:"index")))
            ->getBody();
    }

    public function erro404(): ResponseInterface
    {
        return new Response(status:404, body:$this->renderView(view:"404"));
    }

    public function manual(): void
    {
        $this->downloadPDF(file:"Guia-GLPI");
    }
}
