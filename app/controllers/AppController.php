<?php
namespace Cosanpa\App\controllers;

use Cosanpa\Src\Controller;

class AppController extends Controller
{
    public function index(): void
    {
        $this->view("index");
    }

    public function erro404(): void
    {
        $this->view('404');
    }

    public function manual(): void
    {
        $this->view('manual');
    }

}
