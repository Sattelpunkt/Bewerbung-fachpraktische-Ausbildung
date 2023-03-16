<?php

namespace App\Test\Service;

use Core\BaseService;

class HomeService extends BaseService
{


    public function printTestTemplate(): void
    {
        $this->response->setContentTemplate(get_class($this), 'test');
        $this->response->render();
    }
}
