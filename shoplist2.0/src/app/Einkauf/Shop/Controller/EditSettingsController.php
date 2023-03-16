<?php

namespace App\Einkauf\Shop\Controller;

use App\Einkauf\Shop\Service\EditSettingsService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;

class  EditSettingsController
{
    public function indexAction(array $params, array $cleanData): void
    {
        if ($params['id'] == 1) {
            FlashMessage::add('warning', 'Der Shop undefiniert darf nicht bearbeitet werden');
            Router::go('shop/settings');
        }
        $service = new EditSettingsService();
        $service->printEditSettings($params['id']);
    }

    public function editCatAction(array $params, array $cleanData): void
    {
        $service = new EditSettingsService();
        if ($service->editShop($params['id'],$cleanData['post']['shop'])) {
            FlashMessage::add('success', 'Shop wurde bearbeitet');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }
        Router::go('shop/settings');
    }
}