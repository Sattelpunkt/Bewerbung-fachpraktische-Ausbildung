<?php

namespace App\Einkauf\Shop\Service;

use App\Einkauf\Shop\Repository\MainSettingsRepository;
use Core\BaseService;

class MainSettingsService extends BaseService
{
    public function printMainSettings(): void
    {
        $repository = new MainSettingsRepository();
        $this->response->setContentTemplate(get_class($this), 'MainSettings');
        $this->response->__set('shop', $repository->getAll());
        $this->response->render();
    }

    public function newShop($shop): bool
    {
        $repository = new MainSettingsRepository();
        return $repository->newShop($shop);
    }

}