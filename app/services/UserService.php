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

    public function login(String $login): bool
    {
        unset($_SESSION['user']);

        if (!$usuario = $this->repositorio->findByName($login)) {
            return 0;
        }
        // $result = $this->repositorio->autenticacaoLDAP($usuario['user_dn'], $senha);
        // if (!$result) return [0, "A senha informada não confere. Para solicitar redefinição de senha <a href='#'>clique aqui</a> ", $usuario['name']];

        $email = ($this->repositorio->firstEmail($usuario['id']));
        $_SESSION['user']['id'] = $usuario['id'];
        $_SESSION['user']['name'] = $usuario['name'];
        $_SESSION['user']['firstname'] = $usuario['firstname'];
        $_SESSION['user']['realname'] = $usuario['realname'];
        $_SESSION['user']['email'] = $email['email'] ?? '';

        return 1;
    }

    public function logoff(): void
    {
        unset($_SESSION['user']);
    }

    public function buscaUsuario(String $nome): mixed
    {
        return $this->repositorio->findByName($nome);
    }

    public function userEmail($userId, $email): array|false //Verifica, cadastra e atualiza o email do usuário
    {
        if(!$emailsXUsuario = $this->repositorio->firstEmail($userId)){ //Executa se usuario não possui email cadastrado
            $array_dados = [
                'users_id'  => $userId,
                'is_default'=> 1,
                'email' => $email
            ];
            if($novoEmail = $this->repositorio->saveEmail($array_dados)) $_SESSION['user']['email'] = $email; //atualiza o email do usuário na sessão
            return $novoEmail;
        }
        if($emailsXUsuario['email'] != $email){ //Executa se usuário informa email diferente do cadastrado
            if($novoEmail = $this->repositorio->updateEmail($emailsXUsuario['id'], $email)) $_SESSION['user']['email'] = $email; //atualiza o email do usuário na sessão
            return $novoEmail;
        }
    }
}
