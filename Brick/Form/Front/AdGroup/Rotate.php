<?php
namespace Brick\Form\Front\AdGroup;

use Zend\Form\Fieldset;

class Rotate extends Fieldset
{
	public function __construct($factory)
	{
		parent::__construct('params');
		
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