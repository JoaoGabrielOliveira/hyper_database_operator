<?php
namespace Hyper\Database;

use ConnectionManagement;
use PDOStatement;
use Query;

abstract class QueryRunner
{
    private Query $query;

    public function where($condition):self
    {
        $this->query->where($condition);
        return $this;
    }

    public function and($condition):self
    {
        $this->query->and($condition);
        return $this;
    }

    public function or($condition):self
    {
        $this->query->or($condition);
        return $this;
    }

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