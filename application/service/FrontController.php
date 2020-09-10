<?php

namespace application\service;

use \application\service\Service;
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;

class FrontController {

	protected 
		$view,
		$config,
		$request,
		$session,
		$logger;
	
	public function __construct() {
		$this->session = Service::session();
		$this->view = Service::view();
		$this->config = Service::config();
		$this->request = Service::request();

		$this->logger = new Logger('common');
		$this->logger->pushHandler(new StreamHandler(BASE_PATH.'/logs/common.log', Logger::WARNING));
	}

	protected function before() {
		return true;
	}

	protected function after() {
		return true;
	}

	/**
	 * /?path=controller/action
	 * Ex: /?path=home/index
	 */
	public function run() {

		if ($_SERVER['REQUEST_URI'] == "/") {
			$this->request->set("path", "home/index");
		}
		
		if (is_null($this->request->get("path"))) {
			throw new \Exception("Wrong path");
		}

		list($controller, $action) = explode("/", $this->request->get("path"));
		//HomeController
		$class = '\\application\\controller\\'.ucfirst($controller)."Controller";
	
		
		if (!class_exists($class)) {
			return $this->view->render("error500");
		}

		$controller = new $class;

		if (!method_exists($controller, "action_".$action)) {
			return $this->view->render("error500");
		}

		if (!$controller->before()){
			return $this->view->render("error500");
		}

		$result = $controller->{"action_".$action}();

		$controller->after();

		return $result;
	}
}