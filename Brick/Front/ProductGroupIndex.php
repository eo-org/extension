<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class ProductGroupIndex extends AbstractBrick
{
	public function prepare()
	{
		$sm = $this->_controller->getServiceLocator();
		$layoutFront = $sm->get('Fucms\Layout\Front');
		$layoutType = $layoutFront->getLayoutType();
		$resource = $layoutFront->getResource();
		
		$groupItemId = null;
		if($resource == 'not-found') {
			$groupItemId = 0;
		} else {
			if($layoutType == 'product') {
				$groupItemId = $resource->groupId;
			} else if($layoutType == 'product-list') {
				$groupItemId = $resource->getId();
			}
		}
		
		$factory = $this->dbFactory();
		$groupDoc = $factory->_m('Group')->findProductGroup();
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