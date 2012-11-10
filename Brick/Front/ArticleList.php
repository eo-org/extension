<?php
namespace Brick\Front;

use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Null as NullAdapter;
use Brick\Flex\AbstractBrick;

class ArticleList extends AbstractBrick
{
	public function prepare()
	{
		$sm = $this->_controller->getServiceLocator();
		$layoutFront = $sm->get('Fucms\Layout\Front');
		
		$matches = $this->_controller->getEvent()->getRouteMatch();
		$routeMatchParams = $matches->getParams();
		$routeType = $matches->getMatchedRouteName();
		
		$layoutType = $layoutFront->getLayoutType();
		if($layoutType != 'list') {
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
			
			$co = $factory->_m('Article');
			$co->setFields(array('id', 'label', 'introtext', 'introicon', 'created'))
				->addFilter('groupId', $groupId)
				->setPage($page)
				->setPageSize($pageSize)
				->sort('weight');
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