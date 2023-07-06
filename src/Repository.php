<?php

namespace Cosanpa\PortalGlpi;

use PDO;
use ReflectionClass;

abstract class Repository
{
    protected $PDOconexao;
    protected $tabela;

    function __construct()
    {
        $ref = new ReflectionClass($this);
        $classe = $ref->getShortName();
        $this->tabela = strtolower($classe);
        $this->PDOconexao = Conexao::getConexao();
    }

    protected function getConexao()
    {
        return $this->PDOconexao;
    }

    public function getTabela()
    {
        return $this->tabela;
    }
    
    public function all(string $ordem = 'ASC')
    {
        $qry = "SELECT * FROM $this->tabela ORDER BY id_{$this->tabela} $ordem";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_CLASS, $this->tabela);
    }

    public function byId(int $id)
    {
        $qry = 'SELECT * FROM ' . $this->tabela . " WHERE id_{$this->tabela} = :id";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':id', $id);
        $stm->setFetchMode(PDO::FETCH_CLASS, $this->tabela);
        $stm->execute();
        return $stm->fetch();
    }

    public function last()
    {
        $qry = 'SELECT * FROM ' . $this->tabela . " ORDER BY id_{$this->tabela} DESC LIMIT 1";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->setFetchMode(PDO::FETCH_CLASS, $this->tabela);
        $stm->execute();
        return $stm->fetch();
    }

    public function save($array_dados)
    {
        $colunas = implode(",", array_keys($array_dados));
        $valores = implode("','", $array_dados);
        $qry = "INSERT INTO " . $this->tabela . " ({$colunas}) VALUES ('{$valores}')";
        $stm = $this->PDOconexao->prepare($qry);
        return $stm->execute();
    }

    public function delete($id)
    {
        $qry ="DELETE FROM " . $this->tabela . " WHERE id_{$this->tabela} = :id";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':id', $id);
        return $stm->execute();
    }

    public function update($id, $array_dados)
    {
        foreach($array_dados as $key => $value) {
            $array_aux[] = $key . " = '". trim($value) . "'";
        }
        $qry = 'UPDATE ' . $this->tabela . ' SET ';
        $qry .= implode(' , ', $array_aux);
        $qry .= " WHERE id_{$this->tabela} = :id";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':id', $id);
        return $stm->execute();
    }

}
