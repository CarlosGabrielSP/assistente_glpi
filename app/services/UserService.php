<?php

namespace App\services;

use Cosanpa\PortalGlpi\Infra\UsersRepository;
use Cosanpa\PortalGlpi\Util;

class UserService
{
    private $repositorio;

    function __construct()
    {
        $this->repositorio = new UsersRepository;
    }

    public function login($login, $senha)
    {
        if (!$usuario = $this->repositorio->findByName($login)) {
            return false;
        }

        $ldapServer = '10.20.1.7';
        $ldapBaseDN = $usuario['user_dn']; // Base DN do seu domínio

        $ldapConn = ldap_connect($ldapServer) or die("ERRO");
        ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldapConn, LDAP_OPT_REFERRALS, 0);

        $ldapBind = ldap_bind($ldapConn, $ldapBaseDN, $senha);

        unset($_SESSION['user']);

        if ($ldapBind) {
            $_SESSION['user']['name'] = $usuario['name'];
            $_SESSION['user']['firstname'] = $usuario['firstname'];
            $_SESSION['user']['realname'] = $usuario['realname'];
            ldap_close($ldapConn);
            return true;
        } else {
            ldap_close($ldapConn);
            return false;
        }
        
    }

    public function logoff()
    {
        unset($_SESSION['user']);
    }
}
