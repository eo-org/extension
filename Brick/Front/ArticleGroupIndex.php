<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class ArticleGroupIndex extends AbstractBrick
{
	public function prepare()
	{
		$sm = $this->_controller->getServiceLocator();
		$layoutFront = $sm->get('Fucms\Layout\Front');
		$context = $layoutFront->getContext();
		
		$groupItemId = $context->getGroupItemId();
		$groupDoc = $context->getGroupDoc();
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