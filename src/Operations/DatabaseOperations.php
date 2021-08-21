<?php
namespace Hyper\Record\Operations;
interface DatabaseOperations
{
    public function __construct($database);
    public function execute(string $query);
    public function executeOrRollback(string $query);
    public function feat(string $query, ...$params);
    public function featAll(string $query, ...$params);
}

?>