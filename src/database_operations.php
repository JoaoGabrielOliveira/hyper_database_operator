<?php
namespace Hyper\Record\Operation;

use Hyper\Record\Database;

interface DatabaseOperations
{
    public function __construct(Database $database);
    public function execute(string $query);
    public function executeOrRollback(string $query);
}

?>