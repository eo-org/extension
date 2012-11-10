<?php
namespace Brick\Front\AdGroup;

use Brick\Flex\AbstractBrick;

class FancyTransition extends AbstractBrick
{
	protected $_effectFiles = array(
    	'ad/fancy-transition.plugin.js'
    );
	
	public function prepare()
    {
    	$factory = $this->dbFactory();
    	$sectionId = $this->getParam('sectionId');
    	 	
    	$co = $factory->_m('Ad');
    	$rowset = $co->addFilter('sectionId', $sectionId)
    		->fetchDoc();
    	
        $this->view->rowset = $rowset;
    }
    
    public function getClass()
    {
    	return __CLASS__;
    }
}