<?php
class Navi extends App_Brick_Fixed_Abstract
{
	protected $_naviArr = null;
	
	public function __construct($naviArr)
	{
		$this->_naviArr = $naviArr;
	}
	
	public function prepare()
	{
		$this->view->naviArr = $this->_naviArr;
	}
	
	protected function _getExtName()
	{
		return "Navi";
	}
}