<?php

namespace App\Einkauf\Category\Controller;

use App\Einkauf\Category\Service\MainSettingsService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;


class MainSettingsController
{
    public function indexAction(array $params, array $cleanData): void
    {
        $service = new MainSettingsService();
        $service->printMainSettings();
    }

    public function newCatAction(array $params, array $cleanData): void
    {
        $service = new MainSettingsService();
        if ($service->newCat($cleanData['post']['cat'])) {
            FlashMessage::add('success', 'Kategorie wurde angelegt');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }
        Router::go('cat/settings');
    }
}