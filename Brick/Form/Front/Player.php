<?php
namespace Brick\Form\Front;

use Zend\Form\Fieldset;

class Player extends Fieldset
{
	public function __construct($factory)
	{
		parent::__construct('params');
    	
    	$this->add(array(
    		'name' => 'fileurl',
    		'attributes' => array('type' => 'text'),
    		'options' => array('label' => '媒体文件url')
    	));
    	$this->add(array(
    		'name' => 'showplayer',
    		'type' => 'Zend\Form\Element\Select',
    		'options' => array(
    			'label' => '选择目录组',
    			'value_options' => array('n' => '不显示', 'y' => '显示')
    		)
    	));
	}
}