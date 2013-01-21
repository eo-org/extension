<?php
namespace Brick\Admin;

use Brick\Fixed\AbstractBrick;

class AdminToolbar extends AbstractBrick
{
    public function prepare()
    {
    	$config = $this->controller->getServiceLocator()->get('Config');
    	$this->toolbar = $config['admin_toolbar'];
	}
	
	public function getScriptPath()
	{
		return BASE_PATH.'/extension/view/admin/admintoolbar';
	}
	
	public function getSpriteName()
	{
		return 'head_toolbar';
	}
}