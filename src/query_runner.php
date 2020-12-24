<?php
namespace Hyper\Database;

use ConnectionManagement;
use Query;

abstract class QueryRunner
{
    private Query $query;

    use QueryHelper;

    public function fetch()
    {
        try
        {
            $statement = self::execute( $this->query->limit(1) );
            return $statement->fetch();
        }

        catch(Exception $e)
        {
            return "Error: " . $e->getMessage();
        }
    }

    public function fetchAll()
    {
        try
        {    
            $statement = self::execute($this->query->limit(1));
            return $statement->fetchAll();
        }

        catch(Exception $e)
        {
            return "Error: " . $e->getMessage();
        }
    }

    public function execute(Query $query)
    {
        try
        {
            $statement = ConnectionManagement::prepare_statement($query);
            $statement->execute();
            return $statement;
        }

        catch(Exception $e)
        {
            return "Error: " . $e->getMessage();
        }
    }

}


?>