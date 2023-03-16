<?php

namespace App\Einkauf\Category\Controller;

use App\Einkauf\Category\Service\EditSettingsService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;
use Foundation\Utils\D;


class EditSettingsController
{
    public function indexAction(array $params, array $cleanData): void
    {
        if($params['id'] == 1) {
            FlashMessage::add('warning', 'Die Kategorie undefiniert darf nicht verändert werden');
            Router::go('cat/settings');
        }
        $service = new EditSettingsService();
        $service->printEditSettings($params['id']);
    }

    public function editCatAction(array $params, array $cleanData): void
    {
        $service = new EditSettingsService();
        if ($service->editCat($params['id'], $cleanData['post']['cat'])) {
            FlashMessage::add('success', 'Kategorie wurde bearbeitet');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }
        Router::go('cat/settings');
    }


}
