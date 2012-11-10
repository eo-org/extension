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