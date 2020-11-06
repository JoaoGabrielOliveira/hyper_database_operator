<?php
namespace Hyper\Database\Drivers;

use Hyper\Database\DatabaseConnection as Connection;
use Hyper\Database\DatabaseOperations as Operations;
use Hyper\Database\CRUD\select;

use PDOException;

class PostgreSQLConnection implements Connection, Operations
{
    public $user, $password;
    public $connection_params;
    public function __construct($params)
    {
        $this->connection_params = "pgsql" .
        ':dbname=' . $params['name'] .
        ';host=' . $params['host'] .
        ';port=' . $params['port'] . ';charset=utf8';

        $this->user = $params['user'];
        $this->password = $params['password'];
    }

    public function connect()
    {
        try
        {
            return new \PDO($this->connection_params,$this->user, $this->password);
        }

        catch(PDOException $e)
        {
            echo 'Conexão falhou: ' . $e->getMessage();
        }
    }

    public function get_all_collumns(string $table_name)
    {
        
    }
}

?>