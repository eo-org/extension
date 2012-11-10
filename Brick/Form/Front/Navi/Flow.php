<?php
namespace Brick\Form\Front\Navi;

use Zend\Form\Fieldset;

class Flow extends Fieldset
{
	public function __construct($factory)
	{
		parent::__construct('params');
    	
    	$co = $factory->_m('Navi');
    	$docArr = $co->setFields('label')->fetchArr('label');
    	$this->add(array(
    		'name' => 'naviId',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '选择目录组',
    			'value_options' => $docArr
    		)
    	));
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