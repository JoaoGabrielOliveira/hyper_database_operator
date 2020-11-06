<?php

namespace Hyper\Database;

use Hyper\Database\DatabaseConnection as Connection;
use Hyper\Database\Drivers\PostgreSQLConnection;
use Hyper\Database\Drivers\SQLiteConnection;

use PDO;
use PDOException;
use PDOStatement;
use Exception;

class DbConnection
{   
    public $connection_params;
    private $_driver;
    
    private static $_instance;
    

    public function __construct($params)
    {
        if(isset($params['db']))
        {
            $params = $params['db'];
        }

        switch($params['driver'])
        {
            case 'psql':
                $this->_driver = new PostgreSQLConnection($params);
            break;

            case 'sqlite':
                $this->_driver = new SQLiteConnection($params);
            break;
        }
    }
    
    public function connect()
    {
        return $this->_driver->connect();
    }

    public static function get_instance()
    {
        return self::$_instance;
    }

    public static function set_instance($params)
    {
        if(self::is_intance_null())
        {
            if(is_null($params))
            {
                throw new Exception("Database is not instanced. Create the instance using this method with params of the database.");
            }

            self::$_instance = new DbConnection($params);
        }

        else
        {
            echo "This it's already instanced\n";
        }
    }

    public static function prepare_statement(string $query)
    {
        $connection = self::get_instance()->connect();

        //$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$connection->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);

        return $connection->prepare($query);
    }

    private static function is_intance_null():bool
    {
        if(is_null(self::$_instance))
            return true;
        return false; 
    }

    public static function get_driver($return_driver_name = false)
    {
        $instance = self::get_instance();
        return $return_driver_name ? $instance->connection_params['driver'] : $instance->_driver;
    }
}

?>