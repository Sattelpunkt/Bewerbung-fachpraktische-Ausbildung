<?php

namespace App\Einkauf\Article\Controller;


use App\Einkauf\Article\Service\newService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;
use Foundation\Utils\D;

class NewController
{
    public function indexAction(array $params, array $cleanData): void
    {
        $service = new newService();
        $service->printNew();
    }

    public function insertAction(array $params, array $cleanData): void
    {
        $service = new newService();
        if ($service->insert($cleanData['post'])) {
            FlashMessage::add('success', 'Artikel wurden angelegt');
        } else {
            FlashMessage::add('danger', 'Es ist ein Fehler passiert');
        }
        Router::go('');
    }
}