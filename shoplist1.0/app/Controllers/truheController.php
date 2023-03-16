<?php

class truheController extends Controller {


	public function index($params = []) {
		$model = $this->Model('Truhe');


		$data = $model->getAll();

		if(empty($params[0]) === false){
		 $data = sorting($data, $params[1], $params[2]);

		}



		$view = $this->View();
		$view->site = "truhe/index";
		$view->title = "Truhe";
		//dnd($data);
		$view->outputdata = $data;
		$view->displayHeader();
		$view->displayError();
		$view->displayContent();
		$view->displayFooter();
	}
	public function neu() {

		$model = $this->Model('Truhe');
			$data['kategorien'] = $model->getAllKategorie();
			$data['heute'] = $model->getDateVonHeute();
			//dnd($data);
		$view = $this->View();
		$view->site = "truhe/neu";
		$view->outputdata = $data;
		$view->displayHeader();
		$view->displayError();
		$view->displayContent();
		$view->displayFooter();

	}
	public function insertNeu() {
		$model = $this->Model('Truhe');
		$data = $model->cleanData();
		if($model->createNew($data) == true)
		{
			$GLOBALS["M"]->success('Erfolgreich in die Truhe gepackt');
		}else
		{
			$GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
		}
			$pfad = 'http://'.$_SERVER['HTTP_HOST'].'/'.PN.'/truhe/index';
			header("Location: $pfad");
	}
	public function deleteByID($params = []) {
		$model = $this->Model('Truhe');
		if($data = $model->deleteByID($params['0']) == true ) {
		$GLOBALS["M"]->success('Inhalt gelöscht');

		}else {
			$GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
		}
		$pfad = 'http://'.$_SERVER['HTTP_HOST'].'/'.PN.'/truhe/index';
			header("Location: $pfad");
	}
	public function edit($params = []){
		$model = $this->Model('Truhe');
		$data = $model->getAllbyID($params['0']);
		$view = $this->View();
		$view->site = "truhe/edit";
		$view->title = "Inhalt bearbeiten";
		$view->outputdata['byID'] = $data;
		$view->displayHeader();
		$view->displayError();
		$view->displayContent();
		$view->displayFooter();
	}
	public function update($params = []){
		$model = $this->Model('Truhe');
		if($model->update($params['0']) == true ) {
			$GLOBALS["M"]->success('Truhe wurde Erfolgreich bearbeitet');

		}else {
			$GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
		}
		$pfad = 'http://'.$_SERVER['HTTP_HOST'].'/'.PN.'/truhe/index';
			header("Location: $pfad");


	}
	public function newFromEinkauf($params = []){
		$model = $this->Model('Truhe');
		if($model->newFromEinkauf($params[0]) == true ) {
			$GLOBALS["M"]->success('Truhe wurde Erfolgreich bearbeitet');

		}else {
			$GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
		}
		$pfad = 'http://'.$_SERVER['HTTP_HOST'].'/'.PN.'/truhe/index';
			header("Location: $pfad");


	}

}
