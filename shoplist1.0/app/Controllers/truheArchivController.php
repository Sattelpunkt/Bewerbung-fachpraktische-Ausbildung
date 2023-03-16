<?php

class truheArchivController extends Controller {


	public function index() {
		$model = $this->Model('Truhe');
    $data = $model->getAllArchiv();
		$view = $this->View();
		$view->site = "truheArchiv/index";
		$view->title = "Archiv";
		//dnd($data);
		$view->outputdata = $data;
		$view->displayHeader();
		$view->displayError();
		$view->displayContent();
		$view->displayFooter();
	}
	public function delete() {
		$model = $this->Model('Truhe');

		if($model->deleteArchiv() == true ) {
			$GLOBALS["M"]->success('Archiv gelöscht!');

		}else {
			$GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
		}
		$pfad = 'http://'.$_SERVER['HTTP_HOST'].'/'.PN.'/truheArchiv/index';
			header("Location: $pfad");
	}

}
