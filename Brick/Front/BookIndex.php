<?php
namespace Brick\Front;

use Exception;
use Brick\Flex\AbstractBrick;

class BookIndex extends AbstractBrick
{
    public function prepare()
    {
    	$sm = $this->_controller->getServiceLocator();
		$layoutFront = $sm->get('Fucms\Layout\Front');
		
		$context = $layoutFront->getContext();
    	if($context->getType() != 'book') {
    		throw new Exception('this extension is only suitable for a book typed layout!');
    	}
    	
    	$bookDoc = $context->getContextDoc();
    	if(is_null($bookDoc)) {
    		$this->_disableRender = 'no-resource';
			return;
    	}
    	$this->view->bookAlias = $bookDoc->alias;
    	$this->view->bookIndex = $bookDoc->bookIndex;
    }
    
    public function getClass()
    {
    	return null;
    }
}
