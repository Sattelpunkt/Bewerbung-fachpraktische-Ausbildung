<?php

namespace App\Einkauf\Category\Service;

use App\Einkauf\Category\Repository\MainSettingsRepository;
use Core\BaseService;
use Foundation\Utils\D;

class MainSettingsService extends BaseService
{

    public function printMainSettings(): void
    {
        $repository = new MainSettingsRepository();
        $this->response->setContentTemplate(get_class($this),'MainSettings');
        $this->response->__set('cat', $repository->getAll());
        $this->response->render();
    }

    public function newCat($cat): bool {

        $repository = new MainSettingsRepository();

        return $repository->newCat($cat);
    }
}