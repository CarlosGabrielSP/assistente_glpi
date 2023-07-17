<?php

namespace App\controllers;

use Cosanpa\PortalGlpi\Controller;
use Cosanpa\PortalGlpi\Infra\UsersRepository;

class UsuarioController extends Controller
{

    // TESTE
    public function pesquisaUsuario(){
        echo  date('Y-m-d H:i:s');
        echo "<pre>";
        print_r((new UsersRepository)->findByName("05606-5"));
        echo "</pre>";
        exit();
    }
}
