<?php
namespace Brick\Form\Front\BookIndex;

use Zend\Form\Fieldset;

class Flow extends Fieldset
{
	public function __construct($factory)
	{
		parent::__construct('params');
		
		$this->add(array(
    		'name' => 'style',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '动态显示方向',
    			'value_options' => array('down' => '向下', 'left' => '向左')
    		)
    	));
	}
}