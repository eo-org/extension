<?php
namespace Brick\Front\AdGroup;

use Brick\Flex\AbstractBrick;

class Popup extends AbstractBrick
{
	protected $_effectFiles = array(
    		'ad/popup.plugin.js'
    );
	
    public function prepare()
    {
    	$sectionId = $this->getParam('sectionId');
    	    	
    	$factory = $this->dbFactory();
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