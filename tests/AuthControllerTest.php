<?php

namespace tests;

use tests\BaseTest;
use application\controller\AuthController;

final class AuthControllerTest extends BaseTest{

	

	public function testAuthIndex() {

		$controller = new AuthController();
		
    $this->assertNotNull($this->request("GET", $controller, "action_index"));
  }	
  public function testAuthSignUp() {

		$controller = new AuthController();
		
		$this->assertNotNull($this->request("GET", $controller, "action_signup"));
	}	

}
