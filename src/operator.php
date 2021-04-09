<?php
namespace Hyper\Record;

use Exception;
use Hyper\Record\Database;
use Hyper\Record\Operation\DatabaseOperations;
use Hyper\Record\Connection\DatabaseConnection;

class Operator implements DatabaseOperations
{
    public Database $database;
    public $connection;

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
                throw new \InvalidArgumentException;
            break;
        }
    }

    public function execute(string $query)
    {
        $this->connect();

        $statement = $this->prepareStatement($query);

        $statement->execute();

        $data = $statement->rowCount();

        $this->disconnect();

        return $data;
    }

    public function executeOrRollback(string $query)
    {
        $this->connect();
        $this->connection->beginTransaction();
        try
        {
            $statement = $this->prepareStatement($query);
            $statement->execute();
            $this->connection->commit();
            $this->disconnect();
            return $statement->rowCount();
        }
        catch(Exception $e)
        {
            $this->connection->rollBack();
            $this->disconnect();
            throw $e;
        }
    }

    public function feat(string $query, ...$params)
    {
        $this->connect();

        $statement = $this->prepareStatement($query);

        $statement->execute();

        $data = $statement->feat(...$params);
        
        $this->disconnect();

        return $data;
    }

    public function featAll(string $query, ...$params)
    {
        $this->connect();

        $statement = $this->prepareStatement($query);

        $statement->execute();

        $data = $statement->featAll(...$params);

        $this->disconnect();

        return $data;
    }

    public function doTransaction($do)
    {
        $this->connect();
        $this->connection->beginTransaction();
        try
        {
            yield $do();
        }
        catch(Exception $e)
        {
            $this->connection->rollBack();
            $this->disconnect();
            throw $e;
        }

        $this->connection->commit();
        $this->disconnect();
    }

    protected function prepareStatement(string $query)
    {
        
        return $this->connection->prepare($query);
    }

    protected function connect():void
    {
        $this->connection = $this->connection ?? $this->database->connect();
    }

    protected function disconnect():void
    {
        $this->connection = null;
    }
}

?>