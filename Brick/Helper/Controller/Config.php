<?php
namespace Brick\Helper\Controller;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class Config extends AbstractPlugin
{
	public function setActionMenu($val)
	{
		$this->getServiceManager()->setService('Brick\Admin\ActionMenu\Config', $val);
		return $this;
	}
	
	public function setActionTitle($val)
	{
		$this->getServiceManager()->setService('Brick\Admin\ActionTitle\Config', $val);
		return $this;
	}
	
	public function getServiceManager()
	{
		return $this->getController()->getServiceLocator();
	}
}