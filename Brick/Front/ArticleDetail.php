<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class ArticleDetail extends AbstractBrick
{
    public function prepare()
    {
    	$sm = $this->_controller->getServiceLocator();
    	$layoutFront = $sm->get('Fucms\Layout\Front');
		$layoutType = $layoutFront->getLayoutType();
		$resource = $layoutFront->getResource();
    	
    	$article = $resource;
    	
        if($layoutType == 'article' && $article != 'not-found') {
	        $title = $article->label;
	        if($this->getParam('showHits') == 'y') {
	        	$article->hits++;
	        	$article->save();
	        }
        } else {
        	$title = '文章找不到';
        }
        $this->view->row = $article;
    }
    
    public function getClass()
    {
    	return __CLASS__;
    }
}