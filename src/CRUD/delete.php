<?php
namespace Hyper\Database\CRUD;
use Hyper\Database\QueryRunner;

class delete extends QueryRunner
{
    public function __construct(string $table_name):self
    {
        $this->query->delete($table_name);
        return $this;
    }
}

?>