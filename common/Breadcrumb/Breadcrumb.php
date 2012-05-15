<?php
class Breadcrumb extends App_Brick_Fixed_Abstract
{
	protected function _getExtName()
	{
		return "Breadcrumb";
	}
	
    public function prepare()
    {
    	$request = Zend_Controller_Front::getInstance()->getRequest();
    	
    	$controllerName = $request->getControllerName();
    	$actionName = $request->getParam('action');
    	
    	//reading general category settings for all site from 'admin' db;
    	$db = Zend_Registry::get('siteDb');
    	$tb = new Class_Aqus_Model_Admin_Category_Tb(array('db' => $db));
    	
    	$rowset = $tb->fetchAll();
    	$linkController = new Class_Link_Controller($rowset);
    	
    	//find current displayed category
    	$selectedCategoryRow = null;
    	foreach($rowset as $row) {
    		if($row->controllerName == $controllerName && $row->actionName == 'index') {
    			$selectedCategoryRow = $row;
    		}
    		if($row->controllerName == $controllerName && $row->actionName == $actionName) {
				$selectedCategoryRow = $row;
				break;
			}
    	}
    	$selectedId = $selectedCategoryRow->id;
    	
    	//build trails
    	$currentLink = $linkController->getLink($selectedId);
    	$trailArr = $currentLink->getTrail();
    	
//    	$request->setParam('sectionId', 4);
    	
//    	foreach($trailArr as $l) {
//    		if($l->assemble == true) {
//    			$router = new Zend_Controller_Router_Route($l->href);
//    			$l->href = $router->assemble($request->getParams());
//    		}
//    	}
    	
    	//if using default category for current action, then append a preset text at the end
    	if($actionName != 'index' && $selectedCategoryRow->actionName == 'index') {
    		//append default link at the end of the trail
    		$appendLink = new Class_Link();
    		$appendLink->setId(0)->setParentId(0)->setOrder(0);
    		
    		switch($actionName) {
    			case 'create':
    				$appendLink->label = '创建';
    				break;
    			case 'edit':
    				$appendLink->label = '修改';
    				break;
    			case 'delete':
    				$appendLink->label = '删除';
    				break;
    			default:
    				break;
    		}
    		
		    $trailArr[] = $appendLink;
    	}
    	$this->view->trailArr = $trailArr;
    	if($request->isXmlHttpRequest()) {
    		$this->setScriptFile('front-view.phtml');
    	}
    }
}