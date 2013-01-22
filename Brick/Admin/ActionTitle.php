<?php
namespace Brick\Admin;

use Brick\Fixed\AbstractBrick;

class ActionTitle extends AbstractBrick
{
    public function prepare()
    {
    	$title = $this->getConfig();
    	
		$this->title = $title;
	}
	
	public function getScriptPath()
	{
		return BASE_PATH.'/extension/view/admin/actiontitle';
	}
	
	public function getConfig()
	{
		if($this->controller->getServiceLocator()->has('Brick\Admin\ActionTitle\Config')) {
			return $this->controller->getServiceLocator()->get(__NAMESPACE__ . '\ActionTitle\Config');
		}
		return $this->controller->actionTitle;
	}
}