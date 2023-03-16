<?php

namespace App\Einkauf\Shop\Controller;

use App\Einkauf\Shop\Service\MainSettingsService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;

class MainSettingsController
{
    public function indexAction(array $params, array $cleanData): void
    {
        $service = new MainSettingsService();
        $service->printMainSettings();
    }

    public function newShopAction(array $params, array $cleanData): void
    {
        $service = new MainSettingsService();
        if ($service->newShop($cleanData['post']['cat'])) {
            FlashMessage::add('success', 'Shop wurde angelegt');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }
        Router::go('shop/settings');
    }


}