<?php

class homeController extends Controller{


	public function index($params = []) {
		$model = $this->Model('Einkauf');

		$view = $this->View();
		$view->site = "einkauf/index";
		//dnd($params);

	 $data = $model->getAll();
	 if(empty($params[0]) === false){
		$data = sorting($data, $params[1], $params[2]);


	 }

		$view->outputdata = $data;
        if (empty($params[0]) === false) {

            $view->outputdata['params'] = $params;

        }
        //dnd($view->outputdata);
		$view->displayHeader();
		$view->displayError();
		$view->displayContent();
		$view->displayFooter();
	}
	public function neu() {

		$model = $this->Model('Einkauf');
		$data = $model->getStoreAndKategorie();
        $data['gebindeAll'] = $model->getAllGebinde();
		$view = $this->View();
		$view->site = "einkauf/neu";
		$view->outputdata = $data;
		$view->displayHeader();
		$view->displayError();
		$view->displayContent();
		$view->displayFooter();

	}
	public function insertNeu() {
		//dnd('Test');
		$model = $this->Model('Einkauf');
		$data = $model->cleandata($_POST);
		if($model->createNew($data) == true)
		{
			$GLOBALS["M"]->success('Einkaufzettel wurde erfolgreich erstellt');
		}else
		{
			$GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
		}
			$pfad = 'http://'.$_SERVER['HTTP_HOST'].'/'.PN.'/home/index';
			header("Location: $pfad");
	}
	public function edit($params = []){
		$model = $this->Model('Einkauf');
		$data = $model->getAllbyID($params['0']);

		$data[0]['shop'] = $model->getStoreNameByID($data[0]['shop_id']);
		$data[0]['kategorie'] = $model->getKategorieNameByID($data[0]['kategorie_id']);
		$data['storeKategorie'] = $model->getStoreAndKategorie();
        $data['gebindeAll'] = $model->getAllGebinde();
		$view = $this->View();
		$view->site = "einkauf/edit";
		$view->title = "Einkauf Bearbeiten";
		$view->outputdata = $data;
		$view->displayHeader();
		$view->displayError();
		$view->displayContent();
		$view->displayFooter();
	}
	public function update($params = []) {
		$model = $this->Model('Einkauf');

		if($model->update($params['0']) == true ) {
			$GLOBALS["M"]->success('Einkauf wurde Erfolgreich bearbeitet');

		}else {
			$GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
		}
		$pfad = 'http://'.$_SERVER['HTTP_HOST'].'/'.PN.'/home/index';
			header("Location: $pfad");

	}
	public function deleteByID($params = []) {
        $model = $this->Model('Archiv');
        if($model->deleteArtikelByID($params[0]) == true)
        {
            $GLOBALS["M"]->success('Artikel wurde gelöscht');
        }else
        {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://'.$_SERVER['HTTP_HOST'].'/'.PN.'/home/index';
        header("Location: $pfad");
	}
	public function toTruhe($params = []){
		$model = $this->Model('Einkauf');
		$data = $model->getAllbyID($params['0']);

		$data[0]['heute']= $model->getDateVonHeute();
		$view = $this->View();
		$view->site = "einkauf/toTruhe";
		$view->title = "Ab in die Truhe";
		$view->outputdata = $data;
		$view->displayHeader();
		$view->displayError();
		$view->displayContent();
		$view->displayFooter();
	}
    public function buyByID($params = [])
    {
        $model = $this->Model('Archiv');
        if($model->buyArtikelByID($params[0]) == true)
        {
            $GLOBALS["M"]->success('Artikel wurde gekauft');
        }else
        {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://'.$_SERVER['HTTP_HOST'].'/'.PN.'/home/index';
        header("Location: $pfad");
    }

}
