<?php
namespace Brick\Form\Front;

use Zend\Form\Fieldset;
use Core\Func;

class ProductNews extends Fieldset
{
	public function __construct($factory)
	{
		parent::__construct('params');
		
		$groupDoc = $factory->_m('Group')->addFilter('type', 'product')
    		->fetchOne();
    	$items = $groupDoc->toMultioptions('label');
		$items['all'] = '[全部产品]';
		$this->add(array(
    		'name' => 'groupId',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '产品数据源',
    			'value_options' => $items
    		)
    	));
    	$options = Func::getNumericArray(4, 16);
    	$this->add(array(
    		'name' => 'limit',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '显示产品数量',
    			'value_options' => $options
    		)
    	));
	}
}