<?php
namespace Brick\Form\Front;

use Zend\Form\Fieldset;

class BookpageDetail extends Fieldset
{
	public function __construct($factory)
	{
		parent::__construct('params');
		
		$this->add(array(
    		'name' => 'showTitle',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '显示标题',
    			'value_options' => array('n' => '不显示', 'y' => '显示')
    		)
    	));
	}
}