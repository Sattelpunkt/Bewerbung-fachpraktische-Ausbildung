<?php

class einkaufKategorienController extends Controller
{


    public function index()
    {
        $model = $this->Model('einkaufKategorien');
        $data = $model->getAll();
        $view = $this->View();
        $view->site = "einkaufKategorien/index";
        $view->title = "Kategorien";
        $view->outputdata = $data;
        $view->displayHeader();
        $view->displayError();
        $view->displayContent();
        $view->displayFooter();
    }

    public function neu()
    {

        $model = $this->Model('einkaufKategorien');
        if ($data = $model->insertNew($_POST['name']) == true) {

            $GLOBALS["M"]->success('Ein neue Kategorie wurde angelegt');
        } else {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/einkaufKategorien/index';
        header("Location: $pfad");
    }

    public function edit($params = [])
    {
        $model = $this->Model('einkaufKategorien');
        $data = $model->getAllbyID($params['0']);
        $view = $this->View();
        $view->site = "einkaufKategorien/edit";
        $view->title = "Kategorien Bearbeiten";
        $view->outputdata = $data;
        $view->displayHeader();
        $view->displayError();
        $view->displayContent();
        $view->displayFooter();
    }

    public function update($params = [])
    {
        $model = $this->Model('einkaufKategorien');
        if ($model->getUpdateByID($params['0']) == true) {
            $GLOBALS["M"]->success('Die Kategorie wurde erfolgreich verändert');

        } else {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/einkaufKategorien/index';
        header("Location: $pfad");
    }

    public function deleteByID($params = [])
    {
        $model = $this->Model('einkaufKategorien');
        $model->deleteByID($params['0']);
        if ($model->updateKategorie($params['0']) == true) {
            $GLOBALS["M"]->success('Die Kategorie wurde erfolgreich gelöscht');
        } else {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/einkaufKategorien/index';
        header("Location: $pfad");
    }

    public function detail($params = [])
    {
        $model = $this->Model('einkaufKategorien');
        //dnd($params);


        $einkauf = $model->getAllbyKategorieID($params[0]);
        $ausgabe = $model->getKategorieNameByID($params[0]);

        if (empty($params[1]) === false) {
            $einkauf = sorting($einkauf, $params[2], $params[3]);

        }


        $view = $this->View();
        $view->site = "einkaufKategorien/detail";
        $view->title = $einkauf;
        $view->outputdata['data'] = $einkauf;
        $view->outputdata['kategorie'] = $ausgabe;
        $view->outputdata['kategorie_id'] = $params[0];
        //dnd ($view->outputdata);
        $view->displayHeader();
        $view->displayError();
        $view->displayContent();
        $view->displayFooter();

    }

    public function deleteArtikelbyid($params = [])
    {

        $model = $this->Model('Archiv');
        if ($model->deleteArtikelByID($params[0]) == true) {
            $GLOBALS["M"]->success('Artikel wurde gelöscht');
        } else {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/einkaufKategorien/detail/' . $params[1];
        header("Location: $pfad");

    }

    public function buyByID($params = [])
    {
        $model = $this->Model('Archiv');
        if ($model->buyArtikelByID($params[0]) == true) {
            $GLOBALS["M"]->success('Artikel wurde gekauft');
        } else {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/einkaufKategorien/detail/' . $params[1];
        header("Location: $pfad");
    }
}
