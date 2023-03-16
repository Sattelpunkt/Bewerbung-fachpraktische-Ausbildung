<?php

namespace App\Einkauf\Shop\Controller;


use App\Einkauf\Shop\Service\DeleteSettingsService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;

class DeleteSettingsController
{
    public function indexAction(array $params, array $cleanData): void
    {
        if ($params['id'] == 1) {
            FlashMessage::add('warning', 'Der Shop undefiniert darf nicht gelöscht werden');
            Router::go('cat/settings');
        }
        $service = new DeleteSettingsService();
        if ($service->deleteCat($params['id'])) {
            FlashMessage::add('success', 'Shop wurde gelöscht');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }
        Router::go('shop/settings');

    }
}