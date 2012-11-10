<?php
namespace Brick\Front;

use Brick\Flex\AbstractBrick;

class Html extends AbstractBrick
{
	public function prepare()
    {
		
    }
    
    public function configParam($form)
    {
    	$form->add(array(
    		'name' => 'param_content',
    		'attributes' => array('type' => 'textarea', 'id' => 'ck_text_editor'),
    		'options' => array('label' => 'HTML：')
        ));
        $form->add(array(
        	'name' => 'appendImage',
        	'type' => 'Zend\Form\Element\Button',
        	'attributes' => array(
        		'class' => 'icon-selector',
        		'data-callback' => 'appendToEditor',
        	),
        	'options' => array('label' => '插入图片')
        ));
        
        return $form;
    }
    
    public function getClass()
    {
    	return null;
    }
}