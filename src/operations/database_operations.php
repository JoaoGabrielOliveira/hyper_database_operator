<?php
namespace Hyper\Database;
use Hyper\Database\DbConnection as Connection;
use Hyper\Database\CRUD\select;

class DatabaseOperations
{
    public static function get_all_collumns(string $table_name)
    {
        $columns = null;

        switch(Connection::get_driver())
        {
            case'sqlite':
                $columns = (array)select::execute("PRAGMA_TABLE_INFO('$table_name')", 'name,type');
            break;
        }
        
        return $columns;
    }
}

?>