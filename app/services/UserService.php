<?php

namespace App\services;

use Cosanpa\PortalGlpi\Infra\UsersRepository;

class UserService
{
    private $repositorio;

    function __construct()
    {
        $this->repositorio = new UsersRepository;
    }

    public function login($login): array
    {
        unset($_SESSION['user']);

        if (!$usuario = $this->repositorio->findByName($login)) {
            return [0, "<strong>Usuário não encontrado!</strong> Verifique o usuário digitado ou ligue para o número 3202-8541/8551"];
        }
        // $result = $this->repositorio->autenticacaoLDAP($usuario['user_dn'], $senha);
        // if (!$result) return [0, "A senha informada não confere. Para solicitar redefinição de senha <a href='#'>clique aqui</a> ", $usuario['name']];
        $email = ($this->repositorio->firstEmail($usuario['id'])['email']);
        $_SESSION['user']['id'] = $usuario['id'];
        $_SESSION['user']['name'] = $usuario['name'];
        $_SESSION['user']['firstname'] = $usuario['firstname'];
        $_SESSION['user']['realname'] = $usuario['realname'];
        $_SESSION['user']['email'] = $email ?? '';

        return [1];
    }

    public function logoff()
    {
        unset($_SESSION['user']);
    }

    public function buscaUsuario($nome)
    {
        return $this->repositorio->findByName($nome);
    }


}
