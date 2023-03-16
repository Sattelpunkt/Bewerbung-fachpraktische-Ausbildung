<?php

namespace App\Einkauf\Article\Service;

use App\Einkauf\Article\Repository\HomeRepository;
use Core\BaseService;
use Foundation\Utils\D;

class HomeService extends BaseService
{
    public function printHome(): void
    {
        $repository = new HomeRepository();
        $this->response->setContentTemplate(get_class($this), 'Home');

        $this->response->__set('article', $repository->getAll());
        $this->response->render();
    }
}