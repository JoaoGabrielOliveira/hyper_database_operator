<?php
namespace Hyper\Record\Operation\Drivers;
use Hyper\Record\Operation\SpecificOperations;
use Hyper\Record\Operation\Operator;

class PostgreSQLOperations extends Operator implements SpecificOperations
{
    public function getColumns(string $table):iterable
    {
        $query = "SELECT `information_schema.columns` WHERE `table_name`=$table";
        return $this->feat($query);
    }
}

?>