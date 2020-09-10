<?php
namespace application\controller;

use \application\service\Service;
use \application\controller\BaseController;
use \application\model\TestsModel;

class TestsController extends BaseController {

public function action_index() {


$testsModel = new TestsModel();
  $tr = ['content' => $testsModel->getTestsResults()];
  return $this->view->render("tests/index", [
    'page' => $tr['content']
    ]);

}	
}