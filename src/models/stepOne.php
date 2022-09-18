<?php

namespace douggonsouza\discovery\models;

use douggonsouza\mvc\model\model;
use douggonsouza\propertys\propertys;

class stepOne extends model
{
    public $table = 'stepsOne';
    public $key   = 'stepOne_id';
    public $options = "SELECT stepOne_id as value, name as showName FROM stepsOne %s;";

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