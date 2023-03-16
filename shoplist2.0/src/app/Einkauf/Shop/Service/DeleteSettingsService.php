<?php

namespace App\Einkauf\Shop\Service;



use App\Einkauf\Shop\Repository\DeleteSettingsRepository;

class DeleteSettingsService
{
    public function deleteCat($id): bool
    {
        $repository = new DeleteSettingsRepository();
        return $repository->deleteById($id);
    }
}