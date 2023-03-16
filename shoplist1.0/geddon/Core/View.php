<?php 

class View {
	
	
	public $outputdata = [];
	public $site;
	public $title; 
	
		public function displayHeader() {
			$path = ROOT . DS. 'app' . DS . 'Models' . DS . 'Navigation.php';
			require_once $path;
			$navi = new Navigation();
			$this->outputdata['navi'] = $navi->getAllDropDown();
			require_once ROOT . DS . 'app' . DS . 'Views'. DS . 'header.php';
		}
		public function displayFooter() {
			require_once ROOT . DS . 'app' . DS . 'Views'. DS . 'footer.php';
		}
		public function displayContent() {
			require_once ROOT . DS . 'app' . DS . 'Views'. DS . $this->site . '.php';
		}
		public function displayError() {
			$GLOBALS["M"]->display();
		}
	
}