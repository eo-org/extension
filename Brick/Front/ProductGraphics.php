<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class ProductGraphics extends AbstractBrick
{
    public function prepare()
    {
    	$sm = $this->_controller->getServiceLocator();
    	$layoutFront = $sm->get('Fucms\Layout\Front');
		$product = $layoutFront->getResource();
		
		if($product == 'not-found') {
			$this->_disableRender = 'brick-product-graphics';
		}
		$attachments = $product->attachment;
		$graphics = array();
		foreach($attachments as $atta) {
			if($atta->filetype == 'graphic') {
				$graphics[] = $atta;
			}
		}
        $this->view->graphics = $graphics;
    }
    
    public function getClass()
    {
    	return null;
    }
}