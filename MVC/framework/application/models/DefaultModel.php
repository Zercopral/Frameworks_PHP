<?php
class DefaultModel{

	public $name;

	public function render($file) {
   		ob_start();
   		include(__DIR__ . '/' . $file);
   		return ob_get_clean();
 	}
}