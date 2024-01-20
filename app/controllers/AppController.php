<?php
namespace Cosanpa\App\controllers;

use Cosanpa\Src\Controller;

class AppController extends Controller
{
    public function index(): void
    {
        $this->renderView("index");
    }

    public function erro404(): void
    {
        $this->renderView('404');
    }

    public function manual(): void
    {
        $this->renderView('manual');
    }

}
