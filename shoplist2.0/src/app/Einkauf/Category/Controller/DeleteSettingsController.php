<?php

namespace App\Einkauf\Category\Controller;


use App\Einkauf\Category\Service\DeleteSettingsService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;

class DeleteSettingsController
{

    public function indexAction(array $params, array $cleanData): void
    {
        if ($params['id'] == 1) {
            FlashMessage::add('warning', 'Die Kategorie undefiniert darf nicht gelöscht werden');
            Router::go('cat/settings');
        }
        $service = new DeleteSettingsService();
        if ($service->deleteCat($params['id'])) {
            FlashMessage::add('success', 'Kategorie wurde gelöscht');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }
        Router::go('cat/settings');
    }
}