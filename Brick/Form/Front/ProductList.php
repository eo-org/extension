<?php
namespace Brick\Form\Front;

use Zend\Form\Fieldset;
use Core\Func;

class ProductList extends Fieldset
{
	public function __construct($factory)
	{
		parent::__construct('params');
		
		$this->add(array(
    		'name' => 'showSubgroupContent',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '显示子分类产品',
    			'value_options' => array('y' => '显示', 'n' => '不显示')
    		)
    	));
    	$this->add(array(
    		'name' => 'defaultSort',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '产品默认排序',
    			'value_options' => array(
	        		'sw' => '权重排序',
	        		'sc' => '产品添加顺序',
	        		'sn' => '产品名排序'
	       		)
	       	)
    	));
    	$options = Func::getNumericArray(1, 40);
    	$this->add(array(
    		'name' => 'pageSize',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '每页产品条目',
    			'value_options' => $options
    		)
    	));
	}
}