<?php
namespace Brick\Form\Front\AdGroup;

use Zend\Form\Fieldset;

class FancyTransition extends Fieldset
{
	public function __construct($factory)
	{
		parent::__construct('params');
		
		//$factory = $this->dbFactory();
    	
    	$co = $factory->_m('Ad_Section');
    	$options = $co->fetchArr('label');
    	
    	$this->add(array(
    		'name' => 'sectionId',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '广告组',
    			'value_options' => $options
    		)
    	));
    	$this->add(array(
    		'name' => 'showLabel',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '显示广告名',
    			'value_options' => array('n' => '不显示', 'y' => '显示')
    		)
    	));
    	$this->add(array(
    		'name' => 'showDescription',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '显示广告名显示广告介绍',
    			'value_options' => array('n' => '不显示', 'y' => '显示')
    		)
    	));
    	$this->add(array(
    		'name' => 'delay',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '切换时间',
    			'value_options' => array(
	    			'4000' => '4秒',
	        		'3000' => '3秒',
	        		'2000' => '2秒',
	        		'6000' => '6秒',
    			)
    		)
    	));
	}
}