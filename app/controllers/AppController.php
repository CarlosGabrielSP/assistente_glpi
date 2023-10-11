<?php

namespace App\controllers;

use Cosanpa\PortalGlpi\Controller;

class AppController extends Controller
{
    public function teste(){
        $this->view("teste");
    }

    public function index(){
        $this->view("index");
    }

    public function erro404(){
        $this->view('404');
    }

    public function manual(){
        $this->view('manual');
    }

}
