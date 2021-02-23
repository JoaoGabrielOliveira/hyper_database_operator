<?php
namespace Hyper\Record\Operation;

use Exception;
use Hyper\Record\Operation\DatabaseOperations;
use Hyper\Record\Database;
use Hyper\Record\Connection\DatabaseConnection;
use InvalidArgumentException;

class Operator implements DatabaseOperations
{
    public Database $database;

    public function __construct($database)
    {
        switch($database::class)
        {
            case Database::class :
                $this->database = $database;
            break;

            case DatabaseConnection::class :
                $this->database = new Database($database);
            break;

            default:
                throw new InvalidArgumentException;
            break;
        }
    }

    public function execute(string $query)
    {
        $connection = $this->database->connect();

        $statement = $this->prepareStatement($query,$connection);

        $statement->execute();

        return $statement->rowCount();
    }

    public function executeOrRollback(string $query)
    {
        $connection = $this->database->connect();
        $statement = $this->prepareStatement($query,$connection);
        $this->doTransaction($connection, function($s){
            $s->execute();
        });
        return $statement->rowCount();
    }

    private function doTransaction($connection, $do)
    {
        $connection->beginTransaction();
        try
        {
            $do();
        }
        catch(Exception $e)
        {
            $connection->rollBack();
            throw $e;
        }
        $connection->commit();
    }

    private function prepareStatement(string $query, $connection = null)
    {
        $connection = $connection ?? $this->database->connect();
        return $connection->prepare($query);
    }
}

?>