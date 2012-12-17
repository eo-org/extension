<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class SpriteSurrogate extends AbstractBrick
{
	protected $_effectFiles = array(
		'sprite-surrogate/plugin.js'
	);
	
    public function prepare()
    {
    	$br = $this->_controller->getBrickRegister();
    	$surrogateId = 'surrogate-'.$this->_brick->getId();
    	$tabs = $br->getBrickList($surrogateId);
    	
    	$this->view->tabs = $tabs;
		$this->view->stageId = $this->_brick->stageId;
    }
    
    public function getClass()
    {
    	return null;
    }
}