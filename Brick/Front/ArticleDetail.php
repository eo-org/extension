<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class ArticleDetail extends AbstractBrick
{
    public function prepare()
    {
    	$sm = $this->_controller->getServiceLocator();
    	$layoutFront = $sm->get('Fucms\Layout\Front');
		$context = $layoutFront->getContext();
    	$rm = $layoutFront->getRouteMatch();
    	$articleId = $rm->getParam('id');
    	
    	$factory = $this->dbFactory();
    	$articleDoc = $factory->_m('Article')->find($articleId);
        if($context->getType() == 'article' && $articleDoc != null) {
	        $title = $articleDoc->label;
	        if($this->getParam('showHits') == 'y') {
	        	$articleDoc->hits++;
	        	$articleDoc->save();
	        }
        } else {
        	$title = '文章找不到';
        }
        $this->view->row = $articleDoc;
    }
    
    public function getClass()
    {
    	return __CLASS__;
    }
}