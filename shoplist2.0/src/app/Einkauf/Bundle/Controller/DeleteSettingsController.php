<?php

namespace App\Einkauf\Bundle\Controller;


use App\Einkauf\Bundle\Service\DeleteSettingsService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;

class DeleteSettingsController
{
    public function indexAction(array $params, array $cleanData): void
    {
        if ($params['id'] == 1) {
            FlashMessage::add('warning', 'Das Gebinde -- -- darf nicht gelöscht werden');
            Router::go('cat/settings');
        }
        $service = new DeleteSettingsService();
        if ($service->deleteBundle($params['id'])) {
            FlashMessage::add('success', 'Bundle wurde gelöscht');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }
        Router::go('bundle/settings');

    }
}