<?php

namespace App\Einkauf\Bundle\Controller;

use App\Einkauf\Bundle\Service\EditSettingsService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;

class  EditSettingsController
{
    public function indexAction(array $params, array $cleanData): void
    {
        if ($params['id'] == 1) {
            FlashMessage::add('warning', 'Das Gebinde -- -- darf nicht bearbeitet werden');
            Router::go('bundle/settings');
        }
        $service = new EditSettingsService();
        $service->printEditSettings($params['id']);
    }

    public function editBundleAction(array $params, array $cleanData): void
    {
        $service = new EditSettingsService();
        if ($service->editBundle($params['id'],$cleanData['post']['bundle'])) {
            FlashMessage::add('success', 'Gebinde wurde bearbeitet');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }
        Router::go('bundle/settings');
    }
}