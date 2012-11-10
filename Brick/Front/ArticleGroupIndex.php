<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class ArticleGroupIndex extends AbstractBrick
{
	public function prepare()
	{
		$sm = $this->_controller->getServiceLocator();
		$layoutFront = $sm->get('Fucms\Layout\Front');
		
		$layoutType = $layoutFront->getLayoutType();
		$resource = $layoutFront->getResource();
		$factory = $this->dbFactory();
		
		$groupItemId = null;
		if($resource == 'not-found') {
			$groupItemId = 0;
		} else {
			if($layoutType == 'article') {
				$groupItemId = $resource->groupId;
			} else if($layoutType == 'list') {
				$groupItemId = $resource->getId();
			}
		}
		
		$groupDoc = $factory->_m('Group')->findArticleGroup();
		
		if($this->getParam('level') == 'auto') {
			$branchIndex = $groupDoc->getLevelOneTree($groupItemId);
			$branchIndexArr = array($branchIndex);
		} else {
			$branchIndexArr = $groupDoc->groupIndex;
		}
		
		$this->view->branchIndexArr = $branchIndexArr;
		$this->view->currentGroupItemId = $groupItemId;
	}
	
	public function getClass()
	{
		return __CLASS__;
	}
}