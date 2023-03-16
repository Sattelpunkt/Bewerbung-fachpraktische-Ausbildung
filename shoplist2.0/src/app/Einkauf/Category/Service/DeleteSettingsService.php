<?php

namespace App\Einkauf\Category\Service;


use App\Einkauf\Category\Repository\DeleteSettingsRepository;

class DeleteSettingsService
{
    public function deleteCat($id): bool
    {
        $repository = new DeleteSettingsRepository();
        return $repository->deleteById($id);

    }
}