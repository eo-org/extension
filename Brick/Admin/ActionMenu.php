<?php
namespace Brick\Admin;

use Brick\Fixed\AbstractBrick;

class ActionMenu extends AbstractBrick
{
    public function prepare()
    {
    	$menuArrConfig = $this->getConfig();
    	$urlHelper = new \Zend\Mvc\Controller\Plugin\Url();
    	$urlHelper->setController($this->controller);
    	
		$buttonArr = array();
		foreach($menuArrConfig as $key => $setting) {
			$label = '';
			$method = 'link';
			$callback = null;
			if(is_array($setting)) {
				$label = $setting['label'];
				$callback = $setting['callback'];
				$method = isset($setting['method']) ? $setting['method'] : 'link';
				$aId = isset($setting['id']) ? $setting['id'] : '';
			} else {
				$type = $setting;
				switch($type) {
					case 'create':
						$label = '创建新项目';
						$method = 'link';
						if(empty($callback)) {
							$callback = $urlHelper->fromRoute('admin/actionroutes/wildcard', array('action' => 'create'), null,  true);
						}
						break;
					case 'create-edit':
						$label = '创建新项目';
						$method = 'link';
						if(empty($callback)) {
							$callback = $urlHelper->fromRoute('admin/actionroutes/wildcard', array('action' => 'edit'), null,  true);
						}
						break;
					case 'create-save':
						$label = '创建新项目';
						$method = 'post';
						if(empty($callback)) {
							$callback = $urlHelper->fromRoute('admin/actionroutes/wildcard', array('action' => 'create'), null,  true);
						}
						break;
					case 'save':
					case 'ajax-save':
						$label = '保存';
						$method = 'post';
						if(empty($callback)) {
							$callback = $urlHelper->fromRoute('admin/actionroutes/wildcard', array(), null,  true);
						}
						break;
					case 'delete':
					case 'ajax-delete':
						$label = '删除';
						$method = 'link';
						if(empty($callback)) {
							$callback = $urlHelper->fromRoute('admin/actionroutes/wildcard', array('action' => 'delete'), null,  true);
						}
						break;
					case 'func':
						$label = '确认';
						$method = 'func';
						break;
				}
			}
			/*		
    		$controller = Zend_Controller_Front::getInstance();
    		$request = $controller->getRequest();
    	
			if($method == 'link') {
				if(!$request->isXmlHttpRequest()) {
					$buttonArr[] = "<a class='action-menu' href='".$callback."'>".$label."</a>";
				} else {
					$buttonArr[] = "<a class='action-menu' href='#".$callback."'>".$label."</a>";
				}
			} else {
				$buttonArr[] = "<a class='action-menu' href='".$callback."' method='".$method."'>".$label."</a>";
			}
			*/
			if($method == 'link') {
				$buttonArr[] = "<a class='action-menu' href='".$callback."'>".$label."</a>";
			} else {
				if(!empty($method)) {
					$buttonArr[] = "<a id='".$aId."' class='action-menu' href='".$callback."' method='".$method."'>".$label."</a>";
				} else {
					$buttonArr[] = "<a id='".$aId."' class='action-menu' href='".$callback."'>".$label."</a>";
				}
			}
		}
		$this->buttons = $buttonArr;
    }
    
	public function getScriptPath()
	{
		return BASE_PATH.'/extension/view/admin/actionmenu';
	}
	
	public function getConfig()
	{
		if($this->controller->getServiceLocator()->has('Brick\Admin\ActionMenu\Config')) {
			return $this->controller->getServiceLocator()->get(__NAMESPACE__ . '\ActionMenu\Config');
		}
		return $this->controller->actionMenu;
	}
}