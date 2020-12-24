<?php
namespace Hyper\Database\QueryRunner;
use Hyper\Database\QueryRunner;

class Select extends QueryRunner
{
    public function __construct($table_name, $columns = '*'):self
    {
        $this->query->select($table_name,$columns);
        return($this);
    }
}