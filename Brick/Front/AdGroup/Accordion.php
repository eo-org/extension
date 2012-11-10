<?php
namespace Brick\Front\AdGroup;

use Brick\Flex\AbstractBrick;

class Accordion extends AbstractBrick
{
	protected $_effectFiles = array(
		'ad/accordion/plugin.js',
		'ad/accordion/plugin.css'
	);
	
	public function prepare()
    {
    	$sectionId = $this->getParam('sectionId');
    	
    	$factory = $this->dbFactory();
    	$co = $factory->_m('Ad');
    	$rowset = $co->addFilter('sectionId', $sectionId)
    		->fetchDoc();
    	
        $this->view->rowset = $rowset;
    }
    
    public function getClass()
    {
    	return __CLASS__;
    }
    /*
    public function configParam($form)
    {
    	$co = App_Factory::_m('Ad_Section');
    	$options = $co->fetchArr('label');
    	
        $form->addElement('select', 'param_sectionId', array(
            'filters' => array('StringTrim'),
            'label' => '广告组：',
            'required' => true,
        	'multiOptions' => $options
        ));
		
    	$paramArr = array('param_sectionId');
    	$form->setParam($paramArr);
    	return $form;
    }
    */
}