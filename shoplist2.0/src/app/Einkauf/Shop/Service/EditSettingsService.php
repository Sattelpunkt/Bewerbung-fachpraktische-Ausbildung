<?php

namespace App\Einkauf\Shop\Service;


use App\Einkauf\Shop\Repository\EditSettingsRepository;
use Core\BaseService;

class EditSettingsService extends BaseService
{
    public function printEditSettings(int $id)
    {
        $repository = new EditSettingsRepository();
        $this->response->setContentTemplate(get_class($this), 'EditSettings');
        $this->response->__set('shop', $repository->getShopByID($id));
        $this->response->render();
    }

    public function editShop(int $id, string $name) : bool
    {
        $repository = new EditSettingsRepository();
        return $repository->updateCatByID($id, $name);
    }
}