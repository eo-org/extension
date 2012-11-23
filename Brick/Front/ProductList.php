<?php
namespace Brick\Front;

use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Null as NullAdapter;
use Brick\Flex\AbstractBrick;

class ProductList extends AbstractBrick
{
	public function prepare()
	{
		$sm = $this->_controller->getServiceLocator();
		$layoutFront = $sm->get('Fucms\Layout\Front');
		
		$matches = $this->_controller->getEvent()->getRouteMatch();
		$routeMatchParams = $matches->getParams();
		$routeType = $matches->getMatchedRouteName();
		
		$layoutType = $layoutFront->getLayoutType();
		if($layoutType != 'product-list') {
			$this->_disableRender = 'no-resource';
			return false;
		}
		
		$pageSize = $this->getParam('pageSize');
		if(empty($pageSize)) {
			$pageSize = 20;
		}
		if($routeType == 'application/user-defined') {
			$query = $this->_controller->params()->fromRoute('query');
			$queryArr = explode('-', $query);
			if(count($queryArr) > 1) {
				$page = $queryArr[1];
			} else {
				$page = 1;
			}
		} else {
			$page = $this->_controller->params()->fromRoute('page');
		}
		
		$groupItemId = null;
		$groupDoc = $layoutFront->getResource();
		if($groupDoc == 'not-found' || $groupDoc == null) {
			$this->_disableRender = 'no-resource';
			return;
		} else {
			$groupId = $groupDoc->getId();
			$factory = $this->dbFactory();
			
			$co = $factory->_m('Product');
			$co->setFields(array('id', 'name', 'sku', 'label', 'introicon', 'introtext', 'price', 'attributeDetail'))
				->addFilter('groupId', $groupId)
				->addFilter('status', 'publish')
				->setPage($page)
				->setPageSize($pageSize);
			switch($this->getParam('defaultSort')) {
				case 'sw':
					$co->sort('weight', 1);
					break;
				case 'sc':
					break;
				case 'sn':
					$co->sort('name', 1);
					break;
			}
			$dataSize = $co->count();
			$data = $co->fetchDoc();
			
			$paginator = new Paginator(new NullAdapter($dataSize));
	        Paginator::setDefaultScrollingStyle('Sliding');
	        $paginator->setCurrentPageNumber($page)
	        	->setItemCountPerPage($pageSize);
	        $pages = $paginator->getPages();
			
			$this->view->title = $groupDoc->label;
			$this->view->rowset = $data;
			
			$this->view->routeType = $routeType;
			$this->view->pages = $pages;
			$this->view->routeMatchParams = $routeMatchParams;
		}
	}
	
	public function getClass()
	{
		return __CLASS__;
	}
}