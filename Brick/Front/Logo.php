<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class Logo extends AbstractBrick
{
	public function prepare()
    {
    	$siteDoc = $this->_controller->getSiteDoc();
    	$logo = 'none';
    	if(!empty($siteDoc->logo)) {
    		$logo = $siteDoc->logo;
    	}
    	$this->view->logoPath = $logo;
    }
    
	public function getClass()
	{
		return null;
	}
}