<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class Breadcrumb extends AbstractBrick
{
    public function prepare()
    {
    	$sm = $this->_controller->getServiceLocator();
    	$layoutFront = $sm->get('Fucms\Layout\Front');
    	$context = $layoutFront->getContext();
    	
		$breadcrumbArr = $context->getBreadcrumb();
		if($breadcrumbArr == null) {
			$this->_disableRender = 'no-resource';
			return false;
		}
		$this->view->breadcrumbArr = $breadcrumbArr;
    }
    
    public function getClass()
    {
    	return null;
    }
}