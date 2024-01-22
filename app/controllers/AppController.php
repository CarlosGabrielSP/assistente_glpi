<?php
namespace Cosanpa\App\controllers;

use Cosanpa\Src\Controller;

class AppController extends Controller
{
    public function index(): array
    {
        $partResponse['body'] = $this->renderView(view:"index");
        return $partResponse;
    }

    public function erro404(): array
    {
        $partResponse['status'] = 404;
        $partResponse['body'] = $this->renderView(view:"404");
        return $partResponse;
    }

    public function manual(): void
    {
        $this->downloadPDF(file:"Guia-GLPI");
    }
}
