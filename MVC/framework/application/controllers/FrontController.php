<?php
class FrontController {
	protected $controller, $action, $params, $body;
	static $instance;
	public static function getInstance() {
   		if(!(self::$instance instanceof self)) 
     		self::$instance = new self();
   		return self::$instance;
	}
	private function __construct(){
		$request = $_SERVER['REQUEST_URI'];
   		$splits = explode('/', trim($request,'/'));
   		// Поиск контроллера
   		$this->controller = !empty($splits[0]) ? ucfirst($splits[0]).'Controller' : 'IndexController';
   		// Поиск action
   		$this->action = !empty($splits[1]) ? $splits[1].'Action' : 'indexAction';
   		// Есть ли параметры и их значения?
   		if(!empty($splits[2])){
     		$keys = $values = [];
     		for($i=2, $cnt = count($splits); $i<$cnt; $i++){
       			if($i % 2 == 0){
         		//Чётное = ключ (параметр)
         			$keys[] = $splits[$i];
       			}else{
         		// Значение параметра;
         			$values[] = $splits[$i];
       			}	
     		}
    		$this->params = array_combine($keys, $values);
   		}
	}
	
	public function route() {
		if(class_exists($this->getController())) {
    		$rc = new ReflectionClass($this->getController());
     		if($rc->implementsInterface('IController')) {
       			if($rc->hasMethod($this->getAction())) {
         			$controller = $rc->newInstance();
         			$method = $rc->getMethod($this->getAction());
         			$method->invoke($controller);
       			} else {
         			throw new Exception("Действие не найдено");
       			}
     		} else {
       			throw new Exception("Данный контроллер не реализует интерфейс IController");
     		}
   		} else {
     		throw new Exception("Контроллер не найден {$this->getController()}") ;
   		}
	}

	public function getParams() {
		return $this->params;
	}
	public function getController() {
   		return $this->controller;
	}
	public function getAction() {
		return $this->action;
	}
	public function getBody() {
  		return $this->body;
	}
	public function setBody($body) {
  		$this->body = $body;
	}
}