<?php

namespace App\models;

use Cosanpa\PortalGlpi\Infra\UsersRepository;

class Usuario
{
    // private $login;
    // private $senha;

    // function __cosntruct($login)
    // {
    //     $this->login = $login;
    //     $this->senha = $senha;
    // }

    public function autenticacao($nome)
    {
        return (new UsersRepository)->findByName($nome);
        /* Adicionar validação de SENHA via LDAP */
    }

}
