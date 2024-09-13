<?php
class UserController implements IController {
 
	public function helloAction() {
   		$fc = FrontController::getInstance();
   
   		$model = new DefaultModel();
   		$model->name = $fc->getParams()['name'];
   
   		$result = $model->render('../views/index.php');
   		$fc->setBody($result);
 	}

    public function saveAction() {
        $fc = FrontController::getInstance();
   
   		$model = new UserModel();
   		$model->name = $fc->getParams()['name'];
   
   		$result = $model->save('../views/saved.php');
   		$fc->setBody($result);
    }

    public function readAction() {
        $fc = FrontController::getInstance();
   
   		$model = new UserModel();
   		$model->name = $fc->getParams()['name'];
   
   		$result = $model->read('../views/read.php');
   		$fc->setBody($result);
    }
}