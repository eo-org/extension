<?php
namespace Brick\Front\Navi;

use Brick\Flex\AbstractBrick;

class Dropdown extends AbstractBrick
{
	protected $_effectFiles = array(
    	'navi/dropdown/plugin.js'
    );
	
    public function prepare()
    {
    	$id = $this->getParam('naviId');
    	$factory = $this->dbFactory();
    	$co = $factory->_m('Navi');
    	$doc = $co->find($id);
    	$this->view->naviDoc = $doc;
    }
    
    public function getClass()
    {
    	return __CLASS__;
    }
}
