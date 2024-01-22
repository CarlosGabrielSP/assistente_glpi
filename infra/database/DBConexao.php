<?php
namespace Cosanpa\Infra\database;

use PDO;

abstract class DBConexao
{
    private readonly PDO $PDOconexao;
}