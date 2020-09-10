<?php

namespace tests;

define("BASE_PATH", dirname(dirname(__FILE__)));
define("APP", dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."/application");

use PHPUnit\Framework\TestCase;

abstract class BaseTest extends TestCase{

	
	protected function setUp(): void {
		$loader = new \Twig_Loader_Filesystem(APP.DIRECTORY_SEPARATOR.'view');
		$twig = new \Twig_Environment($loader);
		
		$session = new \application\service\Session();
		$view = new \application\service\View($twig);
		$config = new \application\service\Config();
		$request = new \application\service\Request();
		

		\application\service\Service::set("session", $session);
		\application\service\Service::set("view", $view);
		\application\service\Service::set("config", $config);
		\application\service\Service::set("request", $request);

		$session->set("user", "maksimus@rtural.ru");
		$session->set("role", "Admin");
		$_POST['id_order_status'] = "1";
		$_POST['id_order'] = "1";
		$_POST['login'] = 'maksimus@rtural.ru';
		
	}	

	public function request($method, $controller, $action)
	{
		// Capture STDOUT
		ob_start();
		
		$controller->$action();
		
		// Return STDOUT
		return ob_get_clean();
	}

	protected function tearDown(): void {
		
	}

}
