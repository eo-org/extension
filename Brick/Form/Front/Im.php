<?php
namespace Brick\Form\Front;

use Zend\Form\Fieldset;

class Im extends Fieldset
{
	public function __construct($factory)
	{
		parent::__construct('params');
		 
		$this->add(array(
			'name' => 'qq',
			'attributes' => array('type' => 'text'),
			'options' => array('label' => 'QQ号码（多个号码以\':\'分隔）')
		));
		$this->add(array(
			'name' => 'msn',
			'attributes' => array('type' => 'text'),
			'options' => array('label' => 'MSN号码（多个号码以\':\'分隔）')
		));
		$this->add(array(
			'name' => 'ww',
			'attributes' => array('type' => 'text'),
			'options' => array('label' => '旺旺号码（多个号码以\':\'分隔）')
		));
    }
}