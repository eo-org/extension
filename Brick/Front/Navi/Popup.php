<?php
namespace Brick\Front\Navi;

use Brick\Flex\AbstractBrick;

class Popup extends AbstractBrick
{
	protected $_effectFiles = array(
    	'navi/popup/plugin.js',
		'navi/popup/plugin.css'
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
