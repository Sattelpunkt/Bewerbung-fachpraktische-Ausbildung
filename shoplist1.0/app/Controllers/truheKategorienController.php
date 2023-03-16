<?php

class truheKategorienController extends Controller {


	public function index() {
		$model = $this->Model('truheKategorien');
    $data = $model->getAll();
		$view = $this->View();
		$view->site = "truheKategorien/index";
		$view->title = "Kategorien";
		//dnd($data);
		$view->outputdata = $data;
		$view->displayHeader();
		$view->displayError();
		$view->displayContent();
		$view->displayFooter();
	}
	public function neu() {

		$model = $this->Model('truheKategorien');
		if($data = $model->insertNew($_POST['name']) == true) {

		$GLOBALS["M"]->success('Ein neue Kategorie wurde angelegt');
		}
		else
		{
			$GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
		}
		$pfad = 'http://'.$_SERVER['HTTP_HOST'].'/'.PN.'/truheKategorien/index';
		header("Location: $pfad");
	}
	public function edit($params = []){
		$model = $this->Model('truheKategorien');
		$data = $model->getAllbyID($params['0']);
		$view = $this->View();
		$view->site = "truheKategorien/edit";
		$view->title = "Kategorien Bearbeiten";
		$view->outputdata = $data;
		$view->displayHeader();
		$view->displayError();
		$view->displayContent();
		$view->displayFooter();
	}
	public function update($params = []){
		$model = $this->Model('truheKategorien');
		if($model->getUpdateByID($params['0']) == true ) {
			$GLOBALS["M"]->success('Die Kategorie wurde erfolgreich verändert');

		}else {
			$GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
		}
		$pfad = 'http://'.$_SERVER['HTTP_HOST'].'/'.PN.'/truheKategorien/index';
			header("Location: $pfad");
	}
	public function deleteByID($params = []) {
		$model = $this->Model('truheKategorien');
		$model->deleteByID($params['0']);
		if($model->updateKategorie($params['0']) == true) {
			$GLOBALS["M"]->success('Die Kategorie wurde erfolgreich gelöscht');
			}else {
				$GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
			}
			$pfad = 'http://'.$_SERVER['HTTP_HOST'].'/'.PN.'/truheKategorien/index';
			header("Location: $pfad");
		}
		public function detail($params = []){
		//	dnd($params);
			$model = $this->Model('truheKategorien');
			$einkauf = $model->getKategorieNameByID($params[0]);
			$ausgabe = $model->getAllbyKategorieID($params[0]);
			if(empty($params[1]) === false){
			 $ausgabe = sorting($ausgabe, $params[2], $params[3]);

			}

		$view = $this->View();
		$view->outputdata['kategorie_id']= $params[0];
		$view->site = "truheKategorien/detail";
		$view->title = $einkauf;
		$view->outputdata['data'] = $ausgabe;
		$view->outputdata['kategorie'] = $einkauf;
		//dnd($view->outputdata);
		//dnd ($view->outputdata);

		$view->displayHeader();
		$view->displayError();
		$view->displayContent();
		$view->displayFooter();

		}

}
