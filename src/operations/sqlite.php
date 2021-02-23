<?php
namespace Hyper\Record\Operation;
use Exception;
use Hyper\Record\Operation\Operator;
use Hyper\Record\Operation\SpecificOperations;

class SQLiteOperations extends Operator implements SpecificOperations
{
    public function getColumns(string $table):iterable
    {
        $query = "PRAGMA table_info($table);";
        return $this->feat($query);
    }
}
?>