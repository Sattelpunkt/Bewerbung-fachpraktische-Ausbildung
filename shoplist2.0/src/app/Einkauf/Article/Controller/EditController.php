<?php

namespace App\Einkauf\Article\Controller;

use App\Einkauf\Article\Service\EditService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Request\Router;
use Foundation\Utils\D;

class EditController
{
    public function indexAction(array $params, array $cleanData): void
    {
        if (empty($params['id'])) {
            Router::go('');
        }
        $service = new EditService();
        $service->printEdit($params['id']);

    }
}