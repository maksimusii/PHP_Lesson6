<?php

namespace tests;

use tests\BaseTest;
use application\controller\HomeController;

final class HomeControllerTest extends BaseTest{

	public function testIndex() {

		$controller = new HomeController();
		
		$this->assertNotNull($this->request("GET", $controller, "action_index"));
	}	

	/** @test */
	public function About() {

		$controller = new HomeController();
		
		$this->assertNotNull($this->request("GET", $controller, "action_about"));
	}	
}
