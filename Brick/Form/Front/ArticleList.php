<?php
namespace Brick\Form\Front;

use Zend\Form\Fieldset;
use Core\Func;

class ArticleList extends Fieldset
{
	public function __construct($factory)
	{
		parent::__construct('params');
		
		$this->add(array(
    		'name' => 'level',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '显示子分类文章',
    			'value_options' => array('y' => '显示', 'n' => '不显示')
    		)
    	));
    	$options = Func::getNumericArray(1, 40);
    	$this->add(array(
    		'name' => 'pageSize',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '每页新闻条目',
    			'value_options' => $options
    		)
    	));
	}
}