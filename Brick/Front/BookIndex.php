<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class BookIndex extends AbstractBrick
{
    public function prepare()
    {
    	$sm = $this->_controller->getServiceLocator();
		$layoutFront = $sm->get('Fucms\Layout\Front');
		$layoutType = $layoutFront->getLayoutType();
		$resource = $layoutFront->getResource();
    	
    	if($layoutType != 'book') {
    		throw new Exception('this extension is only suitable for a book typed layout!');
    	}
    	
    	$bookDoc = $resource;
    	
    	$this->view->bookAlias = $bookDoc->alias;
    	$this->view->bookIndex = $bookDoc->bookIndex;
    }
    
    public function getClass()
    {
    	return null;
    }
}
