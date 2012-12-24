<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class Im extends AbstractBrick
{
    public function prepare()
    {
    	$qqArr = explode(':', $this->getParam('qq'));
		$msnArr = explode(':',$this->getParam('msn'));
		$wwArr = explode(':',$this->getParam('ww'));
    	$this->view->qqArr = $qqArr;
		$this->view->msnArr = $msnArr;
		$this->view->wwArr = $wwArr;
    }
    
    public function getClass()
    {
    	return __CLASS__;
    }
}