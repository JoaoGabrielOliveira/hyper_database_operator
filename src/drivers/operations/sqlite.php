<?php
namespace Hyper\Database\Drivers;

use Hyper\Database\DatabaseOperations as Operations;
use Hyper\Database\ConnectionManagement as ConnectionM;
use Hyper\Database\CRUD\select;

use PDO;

class SQLiteOperations implements Operations
{
    public function get_all_collumns(string $table_name)
    {
        return (array)select::execute("PRAGMA_TABLE_INFO('$table_name')", 'name,type');
    }

    public function create_table(string $table_name, array $collumns)
    {
        $SQL_string = <<<EOT
        CREATE TABLE IF NOT EXISTS ' . $table_name . ' (
            name VARCHAR(80),
            cpf VARCHAR(70)
        ) IF EXISTS SELECT 'Tabela já criada'
        EOT;

        $statement = ConnectionM::prepare_statement($SQL_string);

        $statement->execute();
    }

    public function drop_table(string $table_name)
    {
        $SQL_string = "DROP TABLE $table_name;";

        $statement = ConnectionM::prepare_statement($SQL_string);

        $statement->execute();

        return $SQL_string;
    }
}
?>