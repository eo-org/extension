<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class ArticleNews extends AbstractBrick
{
    public function prepare()
    {
        $groupId = $this->getParam('groupId');
    	if(is_null($groupId)) {
    		$groupId = 0;
    	}
    	
    	$factory = $this->dbFactory();
		$groupDoc = $factory->_m('Group_Item')->find($groupId);
		$title = "";
		if(!is_null($groupDoc)) {
			$title = $groupDoc->label;
		}
		$co = $factory->_m('Article');
		$co->setFields(array('groupId', 'label', 'introtext', 'introicon', 'created', 'modified', 'featured'))
			->setPagesize($this->getParam('limit'))
			->setPage(1)
			->sort('_id', -1);
		$co->addFilter('groupId', $groupId);
		
    	$rowset = $co->fetchDoc();
    	
    	$this->view->groupId = $groupId;
		$this->view->groupRow = $groupDoc;
		$this->view->articalRowset = $rowset;
		$this->view->title = $title;
    }
    
    public function getClass()
    {
    	return __CLASS__;
    }
}