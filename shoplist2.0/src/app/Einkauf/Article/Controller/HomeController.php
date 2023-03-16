<?php

namespace App\Einkauf\Article\Controller;

use App\Einkauf\Article\Service\HomeService;

class HomeController
{
    public function indexAction(array $params, array $cleanData): void
    {
        $service = new HomeService();
        $service->printHome();
    }
}