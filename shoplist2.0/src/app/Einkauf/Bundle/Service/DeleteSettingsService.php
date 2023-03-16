<?php

namespace App\Einkauf\Bundle\Service;



use App\Einkauf\Bundle\Repository\DeleteSettingsRepository;

class DeleteSettingsService
{
    public function deleteBundle($id): bool
    {
        $repository = new DeleteSettingsRepository();
        return $repository->deleteById($id);
    }
}