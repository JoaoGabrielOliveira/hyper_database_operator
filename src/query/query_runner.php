<?php
namespace Hyper\Database;

use Hyper\Database\ConnectionManagement;
use Hyper\Database\Query;

use PDOException;
use Exception;

abstract class QueryRunner
{
    private Query $query;

    use QueryHelper;

    public function fetch()
    {
        $statement = $this->execute;
        return $statement->fetch();
    }

    public function fetchAll()
    {
        $statement = $this->execute;
        return $statement->fetch();
    }

    public function execute()
    {
        try
        {
            $statement = ConnectionManagement::prepareStatement($this->query);
            $statement->execute();
            return $statement;
        }
        catch(PDOException $e)
        {
            return "PDO Error: " . $e->getMessage();
        }
        catch(Exception $e)
        {
            return "Error: " . $e->getMessage();
        }
    }
}
?>