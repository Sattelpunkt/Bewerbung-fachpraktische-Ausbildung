<?php

namespace App\Einkauf\Article\Service;

use App\Einkauf\Article\Repository\NewRepository;
use App\Einkauf\Bundle\Repository\MainSettingsRepository AS Bundle;
use App\Einkauf\Category\Repository\MainSettingsRepository AS Cat;
use App\Einkauf\Shop\Repository\MainSettingsRepository AS Shop;
use Core\BaseService;
use Foundation\Utils\D;

class NewService extends BaseService
{
    public function printNew(): void
    {
        $this->response->setContentTemplate(get_class($this), 'New');
        $catRepository = new Cat();
        $dropdown['cat'] = $catRepository->getAll();
        $shopRepository = new Shop();
        $dropdown['shop'] = $shopRepository->getAll();
        $bundleRepository = new Bundle();
        $dropdown['bundle'] = $bundleRepository->getAll();
        $this->response->__set('dropdown', $dropdown);
        $this->response->render();
    }

    public function insert(array $data): bool
    {
        $i = -1;
        $repository = new NewRepository();
        foreach ($data['name'] as $name) {
            $i++;
            if (empty($name)) {
                continue;
            }
            if (!$repository->insertArticle(intval($data['anzahl'][$i]),intval($data['bundle'][$i]), $name, intval($data['cat'][$i]), intval($data['shop'][$i]))) {
                return false;
            }
        }
        return true;
    }
}