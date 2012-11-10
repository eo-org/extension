<?php
namespace Brick\Form\Front\Navi;

use Zend\Form\Fieldset;

class Draw extends Fieldset
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
    		'name' => 'naviWidth',
    		'attributes' => array('type' => 'text'),
    		'options' => array('label' => '背景图宽度')
    	));
    	$this->add(array(
    		'name' => 'naviMargin',
    		'attributes' => array('type' => 'text'),
    		'options' => array('label' => '图片右间距')
    	));
	}
}