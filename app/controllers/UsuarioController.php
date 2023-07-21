<?php

namespace App\controllers;

use Cosanpa\PortalGlpi\Controller;
use Cosanpa\PortalGlpi\Infra\UsersRepository;

class UsuarioController extends Controller
{

    // TESTE
    public function pesquisaUsuario(){

        $resultados = (new UsersRepository)->findByName2($_POST['termo']);
        echo json_encode($resultados);
        
    }
}
