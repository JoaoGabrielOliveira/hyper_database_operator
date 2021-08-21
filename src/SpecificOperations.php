<?php
namespace Hyper\Record;
interface SpecificOperations
{
    public function getColumns(string $table):iterable;
}

?>