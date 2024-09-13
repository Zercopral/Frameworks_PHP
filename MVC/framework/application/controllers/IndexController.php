<?php
class IndexController implements IController {
 
	public function indexAction() {
   		$fc = FrontController::getInstance();
   
   		$model = new DefaultModel();
   		$model->name = "Гость";
   
   		$result = $model->render('../views/index.php');
   		$fc->setBody($result);
 	}
}