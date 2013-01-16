<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class Attachment extends Class_Brick_Solid_Abstract
{
	public function prepare()
    {
    	$layoutFront = $this->_controller->getServiceLocator();
    	$res = $clf->getResourceDoc();
    	if(is_null($res)) {
    		$attachment = null;
    	} else {
    		$attachment = $res->attachment;
    	}
    	if(is_null($attachment) || count($attachment) == 0) {
    		$this->_disableRender = true;
    	}
    	$this->view->attachment = $attachment;
    }
    
    public function getClass()
    {
    	return null;
    }
}