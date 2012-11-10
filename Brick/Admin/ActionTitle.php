<?php
namespace Brick\Admin;

use Brick\Fixed\AbstractBrick;

class ActionTitle extends AbstractBrick
{
    public function prepare()
    {
    	$title = $this->controller->getServiceLocator()->get(__NAMESPACE__ . '\ActionTitle\Config');
    	
		$this->title = $title;
	}
	
	public function getScriptPath()
	{
		return BASE_PATH.'/extension/view/admin/actiontitle';
	}
	
	public function getConfig()
	{
		return $this->controller->getServiceLocator()->get(__NAMESPACE__ . '\ActionTitle\Config');
	}
}