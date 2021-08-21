<?php
namespace Hyper\Record\Operations;
use Hyper\Record\SpecificOperations;
use Hyper\Record\Operator;

class PostgreSQLOperations extends Operator implements SpecificOperations
{
    public function getColumns(string $table):iterable
    {
        $query = "SELECT `information_schema.columns` WHERE `table_name`=$table";
        return $this->feat($query);
    }
}

?>