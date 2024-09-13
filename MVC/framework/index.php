<?php
set_include_path(get_include_path()
					.PATH_SEPARATOR.'application/controllers'
					.PATH_SEPARATOR.'application/models'
					.PATH_SEPARATOR.'application/views');

function load_class($class){
	require_once($class.'.php');
}
spl_autoload_register('load_class');

$front = FrontController::getInstance();
$front->route();
echo $front->getBody();