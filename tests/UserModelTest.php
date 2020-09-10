<?php

use tests\BaseTest;
use application\model\UserModel;

final class UserModelTest extends BaseTest
{
	/**
		* @dataProvider providerUser
		* @test
	  */
	public function testUserIsExisted($b){
		$userModel = new UserModel();
		$user = $userModel->getUserById($b['id']);
		
		$this->assertEquals($b, $user); 
		$this->assertNotEquals(null, $user);

		$userByPass = $userModel->getUserByNameAndPassword($b['login'],'1234');
		
		$this->assertEquals($b,$userByPass);

		$roleByUser = $userModel->getRoleByUser($b['login']);
		$this->assertEquals(array(
			'login' => 'maksimus@rtural.ru',
			'role_name' => 'Admin'
			),$roleByUser);
	 }

	 public function providerUser() {
		return array (        
			array(['id' => '6',
			'name' => 'Maksim',
			'login' => 'maksimus@rtural.ru',
			'password' => '81dc9bdb52d04dc20036dbd8313ed055',
			'last_action' => null
			])
	);
	 }

	 /**
		* @dataProvider providerId
		* @test
	  */
	 public function UsersDbValues($a) {
		$user = new UserModel();
		$user_result = $user->getUserById($a);

		$this->assertNotNull($user_result);
    $this->assertArrayHasKey("name", $user_result);
		$this->assertArrayHasKey("login", $user_result);
		$this->assertArrayHasKey("password", $user_result);
	 }

	 public function providerId() {
		return array (
			array (["id" => 0]),
	);

	 }

}