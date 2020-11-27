<?php
namespace Hyper\Database;
use Hyper\Database\DbConnection;

class OperationsManagement
{
    public static function get_all_collumns(string $table_name)
    {
        return DbConnection::get_driver()->get_all_collumns($table_name);
    }
}

?>