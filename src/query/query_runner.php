<?php
namespace Hyper\Utels;

use Hyper\Record\Connection\ConnectionManagement;
use Hyper\Utels\Query;

use PDOException;
use Exception;

abstract class QueryRunner extends Query
{
    public function fetch()
    {
        $statement = $this->prepare();
        return $statement->fetch();
    }

    public function fetchAll()
    {
        $statement = $this->prepare();
        return $statement->fetchAll();
    }

    public function execute()
    {
        $statement = $this->prepare();
        $statement->execute();
        return $statement->rowCount();
    }
    
    public function prepare()
    {
        try
        {
            $statement = ConnectionManagement::prepareStatement($this->text_query);
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