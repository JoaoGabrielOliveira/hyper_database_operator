<?php
namespace Hyper\Record\Operation;
interface SpecificOperations
{
    public function getColumns(string $table):iterable;
}

?>