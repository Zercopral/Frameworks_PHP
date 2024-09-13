<?php
class UserModel{

	public $name;
    public $file_name;
	public $file_data;

	public function save($file) {

        $file_name = $this->name.".txt";
        $this->file_name = $file_name;
        $file_path = __DIR__ . '/' . '../../data/'.$file_name;

        file_put_contents($file_path, $this->name);

   		ob_start();
   		include(__DIR__ . '/' . $file);
   		return ob_get_clean();
 	}

	 public function read($file) {

        $file_name = $this->name.".txt";
        $this->file_name = $file_name;
        $file_path = __DIR__ . '/' . '../../data/'.$file_name;

        $this->file_data = file_get_contents($file_path, $this->name);

   		ob_start();
   		include(__DIR__ . '/' . $file);
   		return ob_get_clean();
 	}
}