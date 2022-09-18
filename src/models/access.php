<?php

namespace douggonsouza\discovery\models;

use douggonsouza\mvc\model\model;
use douggonsouza\propertys\propertys;

class access extends model
{
    public $table = 'accesses';
    public $key   = 'access_id';
    public $options = "SELECT access_id as value, name as label FROM accesses %s;";

    /**
     * options
     *
     * @return void
     */
    public function options(array $where = null)
    {
        return parent::options($where);
    }
}
?>