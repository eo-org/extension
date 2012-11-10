<?php
namespace Brick\Form\Front;

use Zend\Form\Fieldset;

class ProductGroupIndex extends Fieldset
{
	public function __construct($factory)
	{
		parent::__construct('params');
		
		$this->add(array(
    		'name' => 'level',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '目录组显示方式',
    			'value_options' => array('auto' => '动态', 'all' => '全部')
    		)
    	));
	}
}