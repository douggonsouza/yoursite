<?php

namespace douggonsouza\discovery\controls\admin;

use douggonsouza\mvc\control\actInterface;
use douggonsouza\propertys\propertysInterface;
use douggonsouza\discovery\controls\admin\admin;
use douggonsouza\discovery\models\page;
use douggonsouza\benchmarck\benchmarck;
use douggonsouza\routes\router;

class pages extends admin implements actInterface
{
    const PAGE_CONTENT = BASE_DIR . '/vendor/douggonsouza/benchmarck/src/blocks/dashboardPageContainerMainContentNewPageBlock.phtml';
    
    /**
     * main - Method default
     *
     * @param  propertysInterface $info
     * @return void
     */
    public function main(propertysInterface $info)
    {
        $this->setPage(self::PAGE_CONTENT);

        if(isset($info->POST) && $info->POST['pub_key'] == 'UmVnaXN0cmFyIFDDoWdpbmE='){
            $page = new page();
            $page->populate($info->POST);
            if($page->save()){
                router::alerts()::set('Erro no registro da página.', benchmarck::BADGE_DANGER);
            }
            router::alerts()::set('Página registrada com sucesso.');
        }

        return $this->identified('dashboard', $info);
    }
    
    /**
     * read - Carrega uma página e seus dados
     *
     * @param  propertysInterface $info
     * @return void
     */
    public function read(propertysInterface $info)
    {
        $this->setPage(self::PAGE_CONTENT);

        if(isset($info->POST) && $info->POST['pub_key'] == 'UmVnaXN0cmFyIFDDoWdpbmE='){

        }

        return $this->identified('dashboard', $info);
    }
}
?>