<?php
namespace Brick\Form\Front\AdGroup;

use Zend\Form\Fieldset;

class Accordion extends Fieldset
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
	}
}