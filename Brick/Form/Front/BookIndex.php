<?php
namespace Brick\Form\Front;

use Zend\Form\Fieldset;

class BookIndex extends Fieldset
{
	public function __construct($factory)
	{
		parent::__construct('params');
		
		$this->add(array(
    		'name' => 'style',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '显示标题',
    			'value_options' => array('down' => '向下', 'left' => '向左')
    		)
    	));
	}
}