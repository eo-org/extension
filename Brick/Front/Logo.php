<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class Logo extends AbstractBrick
{
	public function prepare()
    {
    	$dbFactory = $this->_controller->dbFactory();
    	
    	$siteDoc = $dbFactory->_m('Info')->fetchOne();
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