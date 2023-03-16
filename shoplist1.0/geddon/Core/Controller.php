<?php 


class Controller {
	
	
	public function Model($model) {
		
		$path = ROOT . DS. 'app' . DS . 'Models' . DS . $model . '.php';
		 if (file_exists($path)) { 
			 require_once $path;
			 return new $model();
		 }
	}
	public function View() {
		
		return new View();
	}
}