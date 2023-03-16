<?php

namespace App\Einkauf\Bundle\Controller;

use App\Einkauf\Bundle\Service\MainSettingsService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;

class MainSettingsController
{
    public function indexAction(array $params, array $cleanData): void
    {
        $service = new MainSettingsService();
        $service->printMainSettings();
    }

    public function newBundleAction(array $params, array $cleanData): void
    {
        $service = new MainSettingsService();
        if ($service->newBundle($cleanData['post']['bundle'])) {
            FlashMessage::add('success', 'Gebinde wurde angelegt');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }
        Router::go('bundle/settings');
    }


}