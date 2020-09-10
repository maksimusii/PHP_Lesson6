<?php

namespace tests;

use tests\BaseTest;
use application\controller\BaseController;

final class BaseControllerTest extends BaseTest{

	public function testBaseIndex() {

		$controller = new BaseController();
		
		$this->assertNotNull($this->request("GET", $controller, "before"));
		
	}	

}