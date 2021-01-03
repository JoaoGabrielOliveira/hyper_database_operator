<?php
namespace Hyper\Record\Operation;

use Hyper\Record\Database;
use Hyper\Record\Operation\DatabaseOperations;
use Hyper\Record\QueryRunner;

class PostgreSQLOperations implements DatabaseOperations
{
    public Database $database;

    public function create_table(string $table_name,array ...$columns)
    {
        
        $query = new QueryRunner;
        $query->create()->table($table_name);
        foreach($columns as $column)
        {
            $query->addColumn($column[0], $column[1], $column[2]);
        }

        try
        {
            $query->execute();
        }
        catch(Exception $e)
        {
            throw $e;
        }
    }

    public function drop_table(string $table_name)
    {
        $query = new QueryRunner;
        $query->drop()->table($table_name);

        try
        {
            $query->execute();
        }
        catch(Exception $e)
        {
            throw $e;
        }
    }

    public function get_all_columns(string $table_name)
    {
        $query = new QueryRunner;
        $query->select('information_schema.columns')->where(['table_name' => $table_name]);

        try
        {
            return $query->fetch();
        }
        catch(Exception $e)
        {
            throw $e;
        }
    }
}

?>