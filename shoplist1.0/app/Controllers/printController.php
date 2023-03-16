<?php


class printController extends Controller
{

    public function index($params = [])
    {
        $model = $this->Model('Einkauf');
        $view = $this->View();
        $view->site = "print/all";
        $data = $model->getAll();
        if (empty($params[0]) === false) {
            $data = sorting($data, $params[1], $params[2]);

        }

        $view->outputdata = $data;

        if (empty($params[0]) === false) {

            $view->outputdata['params'] = $params;

        }

        $view->displayContent();
    }

    public function shop($params = [])
    {
        $model = $this->Model('Shop');
        $view = $this->View();
        $view->site = "print/shop";
        $data = $model->getAllbyShopID($params[0]);
        $shop = $model->getStoreNameByID($params[0]);
        //dnd($data);
        if (empty($params[1]) === false) {
            $data = sorting($data, $params[2], $params[3]);
        }
        $view->outputdata['data'] = $data;
        $view->outputdata['shop'] = $shop;
        $view->outputdata['shop_id'] = $params[0];
        if (empty($params[0]) === false) {

            $view->outputdata['params'] = $params;

        }
        $view->displayContent();
    }
}