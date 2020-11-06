<?php
namespace Hyper\Database\Drivers;

use Hyper\Database\DatabaseConnection as Connection;
use Hyper\Database\DatabaseOperations as Operations;
use Hyper\Database\CRUD\select;

use PDOException;

class SQLiteConnection implements Connection,Operations
{
    public $connection_params;
    public function __construct($params)
    {
        $this->connection_params = "sqlite" . ":" . $params['path'];
    }

    public function connect()
    {
        try 
        {
            $connection = new \PDO($this->connection_params);
            return $connection;
        }
        catch(PDOException $e)
        {
            echo 'Conexão falhou: ' . $e->getMessage();
        }
    }

    public function get_all_collumns(string $table_name)
    {
        return (array)select::execute("PRAGMA_TABLE_INFO('$table_name')", 'name,type');
    }
}
?>