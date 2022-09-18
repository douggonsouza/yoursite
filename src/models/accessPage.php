<?php

namespace douggonsouza\discovery\models;

use douggonsouza\mvc\model\model;
use douggonsouza\propertys\propertys;

class accessPage extends model
{
    public $table = 'accessesPages';
    public $key   = 'accessPage_id';
    public $options = "SELECT accessPage_id as value, page_id as label FROM accessesPages %s;";

    /**
     * options
     *
     * @return void
     */
    public function options(array $where = null)
    {
        return parent::options($where);
    }
    
    /**
     * pages - Expõe array das páginas do acesso
     *
     * @param int $accessId [explicite description]
     *
     * @return array|null
     */
    public function pages(int $accessId)
    {
        if(!isset($accessId) || empty($accessId)){
            return null;
        }

        $sql = sprintf(
            "SELECT
                ap.page_id,
                p.showName,
                so.showName stepOneShowName,
                so.icon,
                p.url
            FROM accessesPages ap
            JOIN pages p ON p.page_id = ap.page_id AND p.active = 'yes'
            JOIN stepsOne so ON so.stepOne_id = p.stepOne_id AND so.active = 'yes'
            WHERE
                ap.active = 'yes'
                AND ap.access_id = %d
            ORDER BY 
            	so.showName,
            	p.showName;",
            $accessId
        );

        return $this->execute($sql);
    }
}
?>