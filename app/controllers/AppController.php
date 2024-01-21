<?php
namespace Cosanpa\App\controllers;

use Cosanpa\Src\Controller;

class AppController extends Controller
{
    public function index(): void
    {
        $this->renderView(view:"index");
    }

    public function erro404(): void
    {
        $this->renderView(view:"404");
    }

    public function manual(): void
    {
        $this->downloadPDF(file:"Guia-GLPI");
    }
}
