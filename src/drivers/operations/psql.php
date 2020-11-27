<?php
namespace Hyper\Database\Drivers\Operations;

use Hyper\Database\DatabaseOperations as Operations;
use Hyper\Database\Drivers\Connetion\PostgreSQLConnection;
use Hyper\Database\CRUD\select;

use PDOException;

class PostgreSQLOperations implements Operations
{
    public PostgreSQLConnection $connection;

    public function create_table(string $table_name, array $collumns)
    {
        
    }

    public function drop_table(string $table_name)
    {
        
    }

    public function get_all_collumns(string $table_name)
    {
        
    }
}

?>