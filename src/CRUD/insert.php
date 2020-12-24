<?php
namespace Hyper\Database\QueryRunner;
use Hyper\Database\QueryRunner;

class insert extends QueryRunner
{
    public function __construct(string $table):self
    {
        $this->query->insert($table);
        return $this;
    }

    public function addValue(array $value):self
    {
        $this->query->addValue($value);
        return $this;
    }
}
?>