<?php

namespace tests;

use tests\BaseTest;
use application\controller\AdminController;

final class AdminControllerTest extends BaseTest{

	public function testIndex() {

		$controller = new AdminController();
		
    $this->assertNotNull($this->request("GET", $controller, "action_index"));
  }	
  
  public function testAdminChangeStatus() {

		$controller = new AdminController();
		
		$this->assertNotNull($this->request("GET", $controller, "action_changeStatus"));
	}	

}
