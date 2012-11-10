<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class Navi extends AbstractBrick
{
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
