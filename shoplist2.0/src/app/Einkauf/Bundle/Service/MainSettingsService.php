<?php

namespace App\Einkauf\Bundle\Service;

use App\Einkauf\Bundle\Repository\MainSettingsRepository;
use Core\BaseService;

class MainSettingsService extends BaseService
{
    public function printMainSettings(): void
    {
        $repository = new MainSettingsRepository();
        $this->response->setContentTemplate(get_class($this), 'MainSettings');
        $this->response->__set('bundle', $repository->getAll());
        $this->response->render();
    }

    public function newBundle($shop): bool
    {
        $repository = new MainSettingsRepository();
        return $repository->newBundle($shop);
    }

}