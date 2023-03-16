<?php

namespace App\Einkauf\Article\Service;

use App\Einkauf\Article\Repository\EditRepository;
use App\Einkauf\Bundle\Repository\MainSettingsRepository as Bundle;
use App\Einkauf\Category\Repository\MainSettingsRepository as Cat;
use App\Einkauf\Shop\Repository\MainSettingsRepository as Shop;
use Core\BaseService;

class EditService extends BaseService
{
    public function printEdit(int $id): void
    {
        $repository = new EditRepository();
        $this->response->setContentTemplate(get_class($this), 'Edit');
        $catRepository = new Cat();
        $dropdown['cat'] = $catRepository->getAll();
        $shopRepository = new Shop();
        $dropdown['shop'] = $shopRepository->getAll();
        $bundleRepository = new Bundle();
        $dropdown['bundle'] = $bundleRepository->getAll();


        $this->response->__set('article', $repository->getArticleByID($id));
        $this->response->__set('dropdown', $dropdown);
        $this->response->render();
    }
}