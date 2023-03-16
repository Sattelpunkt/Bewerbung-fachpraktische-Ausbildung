<?php

class gebindeController extends Controller
{


    public function index()
    {
        $model = $this->Model('Gebinde');
        $data = $model->getAll();
        $view = $this->View();
        $view->site = "gebinde/index";
        $view->title = "Gebinde";
        $view->outputdata = $data;
        $view->displayHeader();
        $view->displayError();
        $view->displayContent();
        $view->displayFooter();
    }

    public function neu()
    {

        $model = $this->Model('Gebinde');
        if ($data = $model->insertNew($_POST['name']) == true) {

            $GLOBALS["M"]->success('Das Gebinde wurde angelegt');
        } else {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/gebinde/index';
        header("Location: $pfad");
    }

    public function deleteByID($params = [])
    {
        $model = $this->Model('Gebinde');
        $model->deleteByID($params['0']);
        if ($model->updateGebindeAfterDeleteGebinde($params['0']) == true) {
            $GLOBALS["M"]->success('Das Gebinde wurde erfolgreich gelöscht');
        } else {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/gebinde/index';
        header("Location: $pfad");
    }

    public function edit($params = [])
    {
        $model = $this->Model('Gebinde');
        $data = $model->getAllbyID($params['0']);
        $view = $this->View();
        $view->site = "gebinde/edit";
        $view->title = "Gebinde Bearbeiten";
        $view->outputdata = $data;
        $view->displayHeader();
        $view->displayError();
        $view->displayContent();
        $view->displayFooter();
    }

    public function update($params = [])
    {
        $model = $this->Model('Gebinde');
        if ($model->getUpdateByID($params['0']) == true) {
            $GLOBALS["M"]->success('Das Gebinde wurde erfolgreich verändert');

        } else {
            $GLOBALS["M"]->error('Daten konnten nicht verarbeitet werden');
        }
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . '/' . PN . '/gebinde/index';
        header("Location: $pfad");
    }

}