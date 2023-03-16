<?php

class shopController extends Controller
{


    public function index()
    {
        $model = $this->Model('Shop');
        $data = $model->getAll();
        $view = $this->View();
        $view->site = "shop/index";
        $view->title = "Shop";
        $view->outputdata = $data;
        $view->displayHeader();
        $view->displayError();
        $view->displayContent();
        $view->displayFooter();
    }

    public function neu()
    {

        $model = $this->Model('Shop');
        if ($data = $model->insertNew($_POST['name']) == true) {

            $GLOBALS["M"]->success('Ein neuer Shop wurde angelegt');
        } else {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/shop/index';
        header("Location: $pfad");
    }

    public function edit($params = [])
    {
        $model = $this->Model('Shop');
        $data = $model->getAllbyID($params['0']);
        $view = $this->View();
        $view->site = "shop/edit";
        $view->title = "Shop Bearbeiten";
        $view->outputdata = $data;
        $view->displayHeader();
        $view->displayError();
        $view->displayContent();
        $view->displayFooter();
    }

    public function update($params = [])
    {
        $model = $this->Model('Shop');
        if ($model->getUpdateByID($params['0']) == true) {
            $GLOBALS["M"]->success('Die Kategorie wurde erfolgreich verändert');

        } else {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/shop/index';
        header("Location: $pfad");
    }

    public function deleteByID($params = [])
    {

        $model = $this->Model('Shop');
        $model->deleteByID($params['0']);
        if ($model->updateKategorie($params['0']) == true) {
            $GLOBALS["M"]->success('Der Shop wurde erfolgreich gelöscht');
        } else {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/shop/detail/';
        header("Location: $pfad");
    }


    public function detail($params = [])
    {
        $model = $this->Model('Shop');


        $ausgabe = $model->getAllbyShopID($params[0]);
        $shop = $model->getStoreNameByID($params[0]);

        if (empty($params[2]) === false) {
            $ausgabe = sorting($ausgabe, $params[2], $params[3]);

        }
        $view = $this->View();
        $view->site = "shop/detail";
        $view->title = $shop;
        $view->outputdata['data'] = $ausgabe;
        $view->outputdata['shop'] = $shop;
        $view->outputdata['shop_id'] = $params[0];
        if (empty($params[1]) === false) {

            $view->outputdata['params'] = $params;

        }
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
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/shop/detail/' . $params[1];
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
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/shop/detail/' . $params[1];
        header("Location: $pfad");
    }
}

