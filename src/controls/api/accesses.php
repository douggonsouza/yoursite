<?php

namespace douggonsouza\discovery\controls\api;

use douggonsouza\mvc\control\actInterface;
use douggonsouza\propertys\propertysInterface;
use douggonsouza\discovery\controls\admin\admin;
use douggonsouza\mvc\control\act;
use douggonsouza\discovery\models\accessPage;
use douggonsouza\benchmarck\benchmarck;
use douggonsouza\routes\router;

class accesses extends act implements actInterface
{
    const PAGE_CONTENT = BASE_DIR . '/vendor/douggonsouza/benchmarck/src/blocks/dashboardPageContainerMainContentAccessesPagesBlock.phtml';
    
    /**
     * main - Method default
     *
     * @param  propertysInterface $info
     * @return void
     */
    public function main(propertysInterface $info)
    {
        $this->setPage(self::PAGE_CONTENT);

        if(isset($info->POST) && $info->POST['pub_key'] == 'UMOhZ2luYXMgRG8gQWNlc3Nv'){
        
        }

        return $this->identified('dashboard', $info);
    }
    
    /**
     * Method pagesOfAccess - 
     *
     * @param propertysInterface $info 
     *
     * @return mixed
     */
    public function pagesOfAccess(propertysInterface $info)
    {
        $params = array();
        
        // filtra opções
        $request = array_filter(explode('/', $info->REQUEST));
        $accessId = $info->PARAMSREQUEST[0][2];

        $pages = (new accessPage())->pages((int) $accessId);
        if(!empty($pages)){
            $params = $pages;
        }

        return $this->json($params);
    }
}
?>