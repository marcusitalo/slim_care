<?php

define("VERSIONARQ", "?v=1.9");

class CoreController extends DooController
{
	//Current URL
	protected static $_currentUrl = null;
	// Instance of Doo::db
	protected $_db = null;
	//Translator
	protected $_translate = null;
	//Instance of Doo::cache
	protected $_cache = null;
	// Base path of application
	public $_basePath = null;
	// Instace of DooSession
	public $_session = null;
	// Instance of DooAcl
	public $_acl = null;
	// Host
	public $host = null;
	// Js path
	public  $jsPath = null;
	// Css path
	public  $cssPath = null;
	// Class path
	public $classPath = NULL;
	// Para o Template 
	public $data = NULL;
	//URL
	static private $url;

	public function __construct()
	{
		$this->_basePath = Doo::conf()->BASE_PATH;
		$this->_db = Doo::db();
		$this->_view = DooController::view();
		$this->host = Doo::conf()->SITE_PATH;
		$this->_view->host = Doo::conf()->SITE_PATH;
		// ACL
		$this->_acl = Doo::acl();
		// add sessions
		if ($this->_session) {
			session_set_cookie_params(28800);
		}
		$this->_session = Doo::session('user_system');
		//$templateVariables = $this->getSettings();
		//session
		$this->_view->_session = $this->_session;
		$this->_cache = Doo::cache('apc');
		$this->data['baseurl'] = $this->getBaseUrl();
		$this->jsPath  = $this->data['baseurl'] . 'global/js/';
		$this->cssPath = $this->data['baseurl'] . 'global/css/';
		$this->classPath = $this->data['baseurl'] . 'protected/class/';

		$this->data['globais'] = $this->data['baseurl'] . 'global/';

		Doo::loadClass('Cripto');
		Doo::loadClass('Estruturas');
		Doo::loadClass('Sql');
	}

	/**
	 * Before run method
	 */

	public function beforeRun($resource, $action)
	{

		$this->_session = $_SESSION['user_system'];

		//Url Base
		$this->data['base']    = $this->data['baseurl'] = (isset($_SESSION['user_system']['baseurl'])) ? $_SESSION['user_system']['baseurl'] : Doo::conf()->APP_URL;
		//Mensagem para cliente
		$this->data['report'] = (isset($_SESSION['user_system']['report'])) ? $_SESSION['user_system']['report'] : '';
		//Nome do Usuario
		$this->data['usuario'] = (isset($_SESSION['user_system']['usuario'])) ? $_SESSION['user_system']['usuario'] : 'Visitante';
		//Empresa do Usuario
		$this->data['identificador'] = (isset($_SESSION['user_system']['identificador'])) ? $_SESSION['user_system']['identificador'] : null;
		//Verificação do Grupo
		$this->data['group'] = $role = (isset($_SESSION['user_system']['group'])) ? $_SESSION['user_system']['group'] : 'Visitante';

		if ($rs = $this->acl()->process($role, $resource, $action)) {
			//session_get_cookie_params();
			return $rs;
		}
	}

	public function getBaseUrl()
	{
		$base = explode("/", Doo::conf()->SITE_PATH);
		return '/' . $base[count($base) - 2] . '/';
	}


	/**
	 * Redirect method
	 */

	public function _redirect($url)
	{
		header("Location: " . $url);
	}
	/**
	 * isPost Returns true if method is post
	 *
	 * @return boolean
	 */
	public function isPost()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") return true;
		else return false;
	}
	/**
	 * isGet Returns true if method is get
	 *
	 * @return boolean
	 */
	public function isGet()
	{
		if ($_SERVER['REQUEST_METHOD'] == "GET") return true;
		else return false;
	}

	/**
	 * Appends file to header
	 *
	 * @param array $data Data for view part
	 * @param string $url Url of the file
	 * @param string $type Type of the file example: "text/javascript"
	 */

	public function appendFile(&$data, $url, $type)
	{
		$url = (strrpos($url, '?') > 0) ? $url : $url . VERSIONARQ;
		switch ($type) {
			case 'text/javascript':
				$html = '<script type="' . $type . '" src="' . $url . '"></script>';
				//$html = '&lt;script type="'.$type.'" src="'.$url.'"&gt;&lt;/script&gt;';
				break;
			case 'text/css':
				$html = '<link href="' . $url . '" rel="stylesheet" type="' . $type . '"/>';
				break;
			case 'class/php':
				$html = '<?php include("' . $url . '");?>';
				break;
			case '':
				break;
		}

		if (isset($html)) {
			if (isset($data['scripts'])) {
				$data['scripts'] .= $html;
			} else {
				$data['scripts'] = $html;
			}
		}
	}
	/**
	 * Gets path to javascript folder
	 *
	 * @return string Javascript path
	 */

	public function getJsPath()
	{
		return $this->jsPath;
	}

	/**
	 * Gets path to css folder
	 *
	 * @return string Css path
	 */
	public function getCssPath()
	{
		return $this->cssPath;
	}
	/**
	 * Gets path to class folder
	 *
	 * @return string Class path
	 */
	public function getClassPath()
	{
		return $this->classPath;
	}
}
