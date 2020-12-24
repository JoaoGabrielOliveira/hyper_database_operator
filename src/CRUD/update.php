<?php
namespace Hyper\Database\CRUD;
use Hyper\Database\QueryRunner;

class update extends QueryRunner
{
    public function __construct(string $table,array $setters = [])
    {
        $this->query->update($table);

        if(!empty($setters))
        {
            foreach($setters as $field => $value)
            {
                $this->set($field, $value);
            }
        }

        return $this;
    }

    public function set(string $field, $value):self
    {
        $this->query->set($field, $value);
        return $this;
    }
}
?>