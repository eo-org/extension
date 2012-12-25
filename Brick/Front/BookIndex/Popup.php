<?php
namespace Brick\Front\BookIndex;

use Brick\Flex\AbstractBrick;

class Popup extends AbstractBrick
{
	protected $_effectFiles = array(
    	'navi/popup/plugin.js',
		'navi/popup/plugin.css'
    );
	
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
