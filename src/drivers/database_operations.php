<?php

namespace Hyper\Database;

interface DatabaseOperations
{
    public function get_all_collumns(string $table_name);
    public function create_table(string $table_name, array $collumns);
    public function drop_table(string $table_name);
}


?>