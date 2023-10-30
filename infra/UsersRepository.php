<?php

namespace Cosanpa\PortalGlpi\Infra;

use PDO;
use Cosanpa\PortalGlpi\Repository;

class UsersRepository extends Repository
{
    public function findByName(string $name)
    {
        $qry = 'SELECT id,name,firstname,realname,user_dn FROM ' . $this->tabela . " WHERE name = :name";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':name', $name);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute();
        return $stm->fetch();
    }

    public function findByName2(string $name)
    {
        $qry = 'SELECT name FROM ' . $this->tabela . " WHERE name LIKE :name";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':name', $name);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute([':name'=>$name.'%']);
        return $stm->fetchAll();
    }

// Funções Email ========================================================================
    public function firstEmail($userId)
    {
        $qry = "SELECT * FROM glpi_useremails WHERE users_id = :id";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':id', $userId);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute();
        return $stm->fetch();
    }

    public function saveEmail(array $array_dados)
    {
        $colunas = implode(",", array_keys($array_dados));
        $valores = implode("','", $array_dados);
        $qry = "INSERT INTO glpi_useremails ({$colunas}) VALUES ('{$valores}')";
        $stm = $this->PDOconexao->prepare($qry);
        if($stm->execute()) return $array_dados['email'];
        return false;
    }

    public function updateEmail(int $id, String $email)
    {
        $qry = "UPDATE glpi_useremails SET email = :email WHERE id = :id";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':id', $id);
        if($stm->execute()) return $email;
        return false;
    }
// =======================================================================================

    public function autenticacaoLDAP($ldapBaseDN, $pass) 
    {
        $ldapServer = '10.20.1.7';

        $ldapConn = ldap_connect($ldapServer) or die("ERRO");
        ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldapConn, LDAP_OPT_REFERRALS, 0);

        $ldapBind = ldap_bind($ldapConn, $ldapBaseDN, $pass);
        ldap_close($ldapConn);
        
        return $ldapBind;
    }

}