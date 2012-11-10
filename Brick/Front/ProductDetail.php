<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class ProductDetail extends AbstractBrick
{
    public function prepare()
    {
    	$sm = $this->_controller->getServiceLocator();
    	$layoutFront = $sm->get('Fucms\Layout\Front');
		$resource = $layoutFront->getResource();
		
    	$product = $resource;
		if($product == 'not-found') {
			$this->_disableRender = 'brick-product-detail';
		}
        $this->view->row = $product;
    }
    
    public function getClass()
    {
    	return null;
    }
}