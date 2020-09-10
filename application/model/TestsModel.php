<?php

namespace application\model;

use \application\service\Service;
use \application\model\BaseModel;

class TestsModel extends BaseModel {

	public function getTestsResults() {
    $pattern = array('/<!doctype([\s\S]+)?>([\s\S]+)?<body>/i', '/<\/body>/','/<\/html>/');
    $testresult = file_get_contents(BASE_PATH.DIRECTORY_SEPARATOR.'tests'.DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'testdox.html');
    
    return preg_replace($pattern, ' ', $testresult);
  }	
}