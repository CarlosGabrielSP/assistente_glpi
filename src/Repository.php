<?php 
namespace Cosanpa\Src;

use Cosanpa\Infra\database\DBConexaoMysql;
use ReflectionClass;
use PDO;

abstract class Repository
{
    protected readonly PDO $PDOconexao;
    protected $tabela;

    function __construct()
    {
        $ref = new ReflectionClass($this);
        $nomeClasse = $ref->getShortName();
        $this->tabela = 'glpi_'.strtolower(str_replace('Repository','',$nomeClasse)); //O nome do Repository-filho deve iniciar com o nome da respectiva tabela no Banco
        $this->PDOconexao = (new DBConexaoMysql)->DBConexao();
    }

    protected function getConexao()
    {
        return $this->PDOconexao;
    }

    public function getTabela()
    {
        return $this->tabela;
    }
    
    public function findAll(string $ordem = 'ASC')
    {
        $qry = "SELECT * FROM $this->tabela ORDER BY id $ordem";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id)
    {
        $qry = 'SELECT * FROM ' . $this->tabela . " WHERE id = :id";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':id', $id);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute();
        return $stm->fetch();
    }

    public function last()
    {
        $qry = 'SELECT * FROM ' . $this->tabela . " ORDER BY id DESC LIMIT 1";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute();
        return $stm->fetch();
    }

    public function save($array_dados)
    {
        $colunas = implode(",", array_keys($array_dados));
        $valores = implode("','", $array_dados);
        $qry = "INSERT INTO " . $this->tabela . " ({$colunas}) VALUES ('{$valores}')";
        $stm = $this->PDOconexao->prepare($qry);
        if($stm->execute()){
            return $this->last();
        }
        return false;
    }


    /*
    public function delete($id)
    {
        $qry ="DELETE FROM " . $this->tabela . " WHERE id = :id";
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
        $qry .= " WHERE id = :id";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':id', $id);
        return $stm->execute();
    }
    */

}
