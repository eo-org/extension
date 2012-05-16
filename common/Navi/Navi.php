<?php
class Navi extends App_Brick_Fixed_Abstract
{
	protected $_naviArr = null;
	
	public function __construct($naviArr)
	{
		if(array_key_exists('left', $naviArr)) {
			$this->_naviArr = $naviArr;
		} else {
			$this->_naviArr = array(
				'left' => $naviArr,
				'right' => array()
			);
		}
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