<?php
namespace Hyper\Database;
use Hyper\Database\ConnectionManagement;

class OperationsManagement
{
    public static function get_all_columns(string $table_name)
    {
        return ConnectionManagement::get_driver()->get_all_columns($table_name);
    }

    public static function create_table()
    {
        
    }
}

?>