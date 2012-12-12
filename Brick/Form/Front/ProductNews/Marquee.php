<?php
namespace Brick\Form\Front\ProductNews;

use Zend\Form\Fieldset;
use Core\Func;

class Marquee extends Fieldset
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
    	
    	$this->add(array(
    		'name' => 'direction',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '滚动方向',
    			'value_options' => array(
	        		'top' => '向上',
					'left' => '向左'
	        	)
    		)
    	));
    	$this->add(array(
    		'name' => 'delay',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '切换时间',
    			'value_options' => array(
	        		'20' => '适中',
					'30' => '慢',
	        		'10' => '快',
					'1'   => '特快'
	        	),
    		)
    	));
	}
}