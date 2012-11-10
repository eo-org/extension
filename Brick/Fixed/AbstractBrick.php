<?php
namespace Brick\Fixed;

abstract class AbstractBrick
{
	protected $controller = null;
	protected $assigned = array();
	
	public function __construct($controller)
	{
		$this->controller = $controller;
	}
	
	abstract public function getScriptPath();
	
	public function render()
	{
		$twig = new \Twig_Environment(null);
		$loader = new \Twig_Loader_Filesystem($this->getScriptPath());
        $twig->setLoader($loader);
		$template = $twig->loadTemplate('view.tpl');
		
		$this->prepare();
        return $template->render($this->assigned);
	}
	
	public function getEffectFiles()
	{
		return array();
	}
	
	public function getSpriteName()
	{
		return 'body_action';
	}
	
	public function __set($key, $val)
    {
        $this->assigned[$key] = $val;
    }
}