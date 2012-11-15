<?php
namespace Brick\Front\Search;

use MongoRegex;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Null as NullAdapter;
use Brick\Flex\AbstractBrick;

class SearchResult extends AbstractBrick
{
    public function prepare()
    {    	
    	$sm = $this->_controller->getServiceLocator();
		
		$matches = $this->_controller->getEvent()->getRouteMatch();
		$routeMatchParams = $matches->getParams();
		$routeType = $matches->getMatchedRouteName();

		$type = $this->_controller->params()->fromQuery('type');
    	$keywords = $this->_controller->params()->fromQuery('keywords');
    	$page = $this->_controller->params()->fromQuery('page');
    	
    	if(empty($page)) {
    		$page = 1;
    	}
    	
    	$pageSize = 1;
    	$data = array();
    	if(!empty($keywords)) {
    		$factory = $this->dbFactory();
    		if(is_null($type) || $type == 'product') {
    			$type = 'product';
    			$co = $factory->_m('Product');
    			$co->setFields(array('label', 'introtext', 'introicon', 'attributeDetail', 'created'))
    				->addFilter('$or', array(
    					array('label' => new MongoRegex("/".$keywords."/i")),
    					array('name' =>	new MongoRegex("/^".$keywords."/i")),
    				))->setPage($page)
    				->setPageSize($pageSize);
    		} else {
    			$co = $factory->_m('Article');
    			$co->setFields(array('label', 'introtext', 'introicon', 'created'))
    				->addFilter('label', new MongoRegex("/".$keywords."/i"))
    				->setPage($page)
    				->setPageSize($pageSize);
    		}
    	}
    	
		$dataSize = $co->count();
		$data = $co->fetchDoc();
		
		$paginator = new Paginator(new NullAdapter($dataSize));
		Paginator::setDefaultScrollingStyle('Sliding');
		$paginator->setCurrentPageNumber($page)
			->setItemCountPerPage($pageSize);
		$pages = $paginator->getPages();
		
		$this->view->rowset = $data;
    	$this->view->type = $type;
    	
    	$this->view->routeType = 'application/search';
		$this->view->pages = $pages;
		$this->view->routeMatchParams = $routeMatchParams;
		$this->view->getQueryParams = array(
			'type' => 'type='.$type,
			'keywords' => 'keywords='.$keywords,
		);
    }
    
    public function getClass()
    {
    	return null;
    }
}