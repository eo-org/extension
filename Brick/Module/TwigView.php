<?php
namespace Brick\Module;

use Fucms\Session\Admin;

class TwigView
{
	static public $twigEnv = null;
	
    protected $_assigned = array();
    protected $_twigEnv;

    /**
     * extra controller links
     * @var array
     */
    protected $_gearLinks = array();
    
    protected $_brickId = null;
    protected $_extName = null;
    protected $_classSuffix = null;
    protected $_brickName = null;
    
    static public function setTwigEnv($twigEnv)
    {
    	self::$twigEnv = $twigEnv;
    }
    
    static public function getTwigEnv()
    {
    	if(is_null(self::$twigEnv)) {
    		self::$twigEnv = new \Twig_Environment(null, array());
    	}
    	return self::$twigEnv;
    }
    
    public function __construct()
    {
//         $this->_twigEnv = new \Twig_Environment($loader, $envOptions);
//         $this->_twigEnv->addFilter('outputImage',		new \Twig_Filter_Function('Brick\Helper\Twig\Filter::outputImage'));
//         $this->_twigEnv->addFilter('graphicDataJson',	new \Twig_Filter_Function('Brick\Helper\Twig\Filter::graphicDataJson'));
//         $this->_twigEnv->addFilter('substr',			new \Twig_Filter_Function('Brick\Helper\Twig\Filter::substr'));
//         $this->_twigEnv->addFilter('url',				new \Twig_Filter_Function('Brick\Helper\Twig\Filter::url'));
//         $this->_twigEnv->addFilter('pageLink',			new \Twig_Filter_Function('Brick\Helper\Twig\Filter::pageLink'));
//         $this->_twigEnv->addFilter('translate',			new \Twig_Filter_Function('Brick\Helper\Twig\Filter::translate'));
    }

    /**
     * Set the template loader
     *
     * @param Twig_LoaderInterface $loader
     * @return void
     */
    public function setLoader($loader)
    {
        $this->_twigEnv->setLoader($loader);
    }
    
    /**
     * Get the template loader
     *
     * @return Twig_LoaderInterface
     */
    public function getLoader()
    {
        return $this->_twigEnv->getLoader();
    }
    
    /**
     * Get the twig environment
     * 
     * @return Twig_Environment
     */
    public function getEngine()
    {
        return $this->_twigEnv;
    }

    /**
     * Set the path to the templates
     *
     * @param string $path The directory to set as the path.
     * @return void
     */
    public function setScriptPath($path)
    {
        $loader = new \Twig_Loader_Filesystem($path);
        $this->setLoader($loader);
        return $this;
    }

    
    public function addScriptPath($path)
    {
    	$loader = $this->getLoader();
    	$loader->addPath($path);
    	return $this;
    }
    
    /**
     * Retrieve the current template directory
     *
     * @return string
     */
    public function getScriptPaths()
    {
        $loader = $this->getLoader();
        $path = ($loader instanceof Twig_Loader_FileSystem) 
            ? $loader->getPaths()
            : '';

        return $path;
    }

    public function setExtName($extName)
    {
    	$this->_extName = $extName;
    	return $this;
    }
    
    public function setClassSuffix($classSuffix)
    {
    	$this->_classSuffix = $classSuffix == null ? '' : ' '.$classSuffix;
    	return $this;
    }
    
    protected function _renderClass()
    {
    	return 'brick-'.strtolower(substr($this->_extName, 6)).$this->_classSuffix;
    }
    
    /**
     * Assign a variable to the template
     *
     * @param string $key The variable name.
     * @param mixed $val The variable value.
     * @return void
     */
    public function __set($key, $val)
    {
        $this->assign($key, $val);
    }

    /**
     * Allows testing with empty() and isset() to work
     *
     * @param string $key
     * @return boolean
     */
    public function __isset($key)
    {
        return isset($this->_assigned[$key]);
    }

    /**
     * Allows unset() on object properties to work
     *
     * @param string $key
     * @return void
     */
    public function __unset($key)
    {
        unset($this->_assigned[$key]);
    }

    /**
     * Assign variables to the template
     *
     * Allows setting a specific key to the specified value, OR passing
     * an array of key => value pairs to set en masse.
     *
     * @see __set()
     * @param string|array $spec The assignment strategy to use (key or
     * array of key => value pairs)
     * @param mixed $value (Optional) If assigning a named variable,
     * use this as the value.
     * @return void
     */
    public function assign($spec, $value = null)
    {
        if (is_array($spec)) {
            $this->_assigned = array_merge($this->_assigned, $spec);
        } else if(is_object($spec)) {
        	$spec = get_object_vars($spec);
        	$this->_assigned = array_merge($this->_assigned, $spec);
        } else {
        	$this->_assigned[$spec] = $value;
        }
    }

    /**
     * Clear all assigned variables
     *
     * Clears all variables assigned to Zend_View either via
     * {@link assign()} or property overloading
     * ({@link __get()}/{@link __set()}).
     *
     * @return void
     */
    public function clearVars()
    {
        $this->_assigned = array();
    }
    
    public function setBrickId($id)
    {
    	$this->_brickId = $id;
    	return $this;
    }
    
    /**
     * Processes a template and returns the output.
     *
     * @param string $name The template to process.
     * @return string The output.
     */
    public function render($name)
    {
        $template = self::$twigEnv->loadTemplate($name);
        $sessionAdmin = new Admin();
        if($sessionAdmin->isLogin()) {
        	$tHead = '<div class="'.$this->_renderClass().'" brick-id="'.$this->_brickId.'" ext-name="'.$this->_extName.'" >';
        } else {
        	$tHead = '<div class="'.$this->_renderClass().'">';
        }
        
        $tTail = "</div>";
        return $tHead.$template->render($this->_assigned).$tTail;
    }
}