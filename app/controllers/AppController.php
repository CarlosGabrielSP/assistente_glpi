<?php

namespace App\controllers;

use Cosanpa\PortalGlpi\Controller;

class AppController extends Controller
{
    public function login(){
        $this->view("login");
    }

    public function index(){
        $this->view("index");
    }

    public function erro404(){
        $this->view('app/404');
    }

}
