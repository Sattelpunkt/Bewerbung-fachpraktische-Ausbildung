<?php

namespace App\Einkauf\Bundle\Service;


use App\Einkauf\Bundle\Repository\EditSettingsRepository;
use Core\BaseService;

class EditSettingsService extends BaseService
{
    public function printEditSettings(int $id)
    {
        $repository = new EditSettingsRepository();
        $this->response->setContentTemplate(get_class($this), 'EditSettings');
        $this->response->__set('bundle', $repository->getBundleByID($id));
        $this->response->render();
    }

    public function editBundle(int $id, string $name) : bool
    {
        $repository = new EditSettingsRepository();
        return $repository->updateBundleByID($id, $name);
    }
}