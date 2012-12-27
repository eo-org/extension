<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class ProductChildGroupIndex extends AbstractBrick
{
	public function prepare()
	{
		$sm = $this->_controller->getServiceLocator();
		$layoutFront = $sm->get('Fucms\Layout\Front');
		$context = $layoutFront->getContext();
		
		$groupItemId = $context->getGroupItemId();
		$groupDoc = $context->getGroupDoc();
		
		$branchIndex = $groupDoc->getLeaf($groupItemId);
		$branchIndexArr = array($branchIndex);
		
		$this->view->branchIndexArr = $branchIndexArr;
		$this->view->currentGroupItemId = $groupItemId;
	}
	
	public function getClass()
	{
		return null;
	}
}