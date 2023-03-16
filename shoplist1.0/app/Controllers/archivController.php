<?php

class archivController extends Controller
{

    public function home($params = [])
    {
        $model = $this->Model('Archiv');

        $view = $this->View();
        $view->site = "archiv/index";
        //dnd($params);

        $data = $model->getAllArchiv(1);

        $view->outputdata = $data;
        //dnd($view->outputdata);
        $view->displayHeader();
        $view->displayError();
        $view->displayContent();
        $view->displayFooter();
    }

    public function deleteByID($params = [])
    {
        $model = $this->Model('Archiv');
        if ($model->deleteArtikelByID($params[0]) == true) {
            $GLOBALS["M"]->success('Artikel wurde gelöscht');
        } else {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/archiv/home';
        header("Location: $pfad");
    }
    public function deleteArchiv($params = []) {
        #params?
        //dnd($params);
        $model = $this->Model('Archiv');
        if ($model->deleteArchiv($params[0]) == true ) {
            $GLOBALS["M"]->success('Gelöscht');
        } else {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/archiv/archiv';
        header("Location: $pfad");
    }





    public function archiv($params = [])
    {
        $model = $this->Model('Archiv');

        $view = $this->View();
        $view->site = "archiv/archiv";
        //dnd($params);

        $data = $model->getAllArchiv(2);

        $view->outputdata = $data;
        //dnd($view->outputdata);
        $view->displayHeader();
        $view->displayError();
        $view->displayContent();
        $view->displayFooter();
    }

}