<?php
namespace Brick\Form\Front;

use Zend\Form\Fieldset;

class Html extends Fieldset
{
	public function __construct($factory)
	{
		parent::__construct('params');
    	
    	$this->add(array(
    		'name' => 'content',
    		'attributes' => array('type' => 'textarea', 'id' => 'ck_text_editor'),
    		'options' => array('label' => 'HTML：')
        ));
        $this->add(array(
        	'name' => 'appendImage',
        	'type' => 'Zend\Form\Element\Button',
        	'attributes' => array(
        		'class' => 'icon-selector',
        		'data-callback' => 'appendToEditor',
        	),
        	'options' => array('label' => '插入图片')
        ));
	}
}