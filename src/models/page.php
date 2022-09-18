<?php

namespace douggonsouza\discovery\models;

use douggonsouza\mvc\model\model;
use douggonsouza\propertys\propertys;

class page extends model
{
    public $table = 'pages';
    public $key   = 'page_id';
    public $options = "SELECT page_id as value, showName as label FROM pages %s;";

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