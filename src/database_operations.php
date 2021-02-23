<?php
namespace Hyper\Record\Operation;

use Hyper\Record\Database;

interface DatabaseOperations
{
    public function __construct($database);
    public function execute(string $query);
    public function executeOrRollback(string $query);
    public function feat(string $query, ...$params);
    public function featAll(string $query, ...$params);
}

?>