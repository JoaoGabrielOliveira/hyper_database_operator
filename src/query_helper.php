<?php
namespace Hyper\Database;
trait QueryHelper
{
    public function where($condition):self
    {
        $this->query->where($condition);
        return $this;
    }

    public function and($condition):self
    {
        $this->query->and($condition);
        return $this;
    }

    public function or($condition):self
    {
        $this->query->or($condition);
        return $this;
    }
}
?>