<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class Player extends AbstractBrick
{
    public function prepare()
    {
    	$fileurl = $this->getParam('fileurl');
    	$showplayer = $this->getParam('showplayer');
    	$liburl = \Class_Server::libUrl();
    	
    	
    	$this->view->liburl = $liburl;
    	$this->view->fileurl = $fileurl;
    	$this->view->showplayer = $showplayer;
    }
    
    public function getClass()
    {
    	return __CLASS__;
    }
}