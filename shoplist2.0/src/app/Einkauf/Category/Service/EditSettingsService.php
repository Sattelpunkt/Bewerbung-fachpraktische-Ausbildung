<?php

namespace App\Einkauf\Category\Service;

use App\Einkauf\Category\Repository\EditSettingsRepository;
use Core\BaseService;
use Foundation\Utils\D;

class EditSettingsService extends BaseService
{

    public function printEditSettings(int $id): void
    {
        $repository = new EditSettingsRepository();
        $this->response->setContentTemplate(get_class($this), 'EditSettings');
        $this->response->__set('cat', $repository->getCatByID($id));
        $this->response->render();
    }

    public function editCat(int $id , string $name): bool
    {
        $repository = new EditSettingsRepository();
        return $repository->updateCatByID($id, $name);
    }

}
