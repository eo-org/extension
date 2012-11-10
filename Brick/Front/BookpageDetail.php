<?php
namespace Brick\Front;

use MongoId;
use Brick\Flex\AbstractBrick;

class BookpageDetail extends AbstractBrick
{
    public function prepare()
    {
    	$sm = $this->_controller->getServiceLocator();
		$layoutFront = $sm->get('Fucms\Layout\Front');
		$resource = $layoutFront->getResource();
		
		$matches = $this->_controller->getEvent()->getRouteMatch();
		$routeMatchParams = $matches->getParams();
		
    	$pageName = $routeMatchParams['query'];
    	$factory = $this->dbFactory();
    	$co = $factory->_m('Book_Page');
    	
    	$pageDoc = $co->addFilter('$or', array(
    		array('_id' => new MongoId($pageName)),
    		array('alias' => $pageName)
    	))->fetchOne();
    	$this->view->doc = $pageDoc;
    }
    
    public function getClass()
    {
    	return __CLASS__;
    }
}