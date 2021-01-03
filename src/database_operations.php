<?php
namespace Hyper\Record\Operation;

interface DatabaseOperations
{
    public function get_all_columns(string $table_name, ...$args);
    public function create_table(string $table_name,array ...$columns);
    public function drop_table(string $table_name);
}

?>