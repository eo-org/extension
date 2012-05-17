<?php
class Navi extends App_Brick_Fixed_Abstract
{
	protected $_naviArr = null;
	
	public function __construct($naviArr)
	{
		if(array_key_exists('left', $naviArr)) {
			$this->_naviArr = $naviArr;
		} else {
			$csu = Class_Session_User::getInstance();
			$this->_naviArr = array(
				'left' => $naviArr,
				'right' => array(
					array('title' => '我的账户', 'url' => '/'.$csu->getUserId().'/user'),
					array('title' => '登出', 'url' => 'http://sso.enorange.cn/sso/logout')
				)
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