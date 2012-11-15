<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class Html extends AbstractBrick
{
	public function prepare()
    {
		$this->view->content = $this->getParam('content');
    }
    
    public function getClass()
    {
    	return __CLASS__;
    }
}