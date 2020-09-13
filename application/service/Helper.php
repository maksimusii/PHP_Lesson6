<?php
namespace application\service;

use \application\model\UserModel;
use \application\service\Session;

class Helper {

public function setRole($login) {
  $role = (UserModel::getRoleByUser($login))["role_name"];
  Session::set("role", $role);
  return true;
}

public function getPageRestriction($role, $page) {
  $currentRole = Session::get("role");
  if ($currentRole == $role) {
    return $page;
  } else {
    return "PageUnavailable";
  }

}



}