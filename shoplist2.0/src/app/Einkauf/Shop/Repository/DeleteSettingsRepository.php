<?php

namespace App\Einkauf\Shop\Repository;
use Foundation\Database\Database;

class DeleteSettingsRepository
{

    public function deleteById($id): bool
    {
        $db = new Database('EinkaufShop');
        return $db->delete()->where("id", "=",":id")->args([':id' => $id])->run();
    }
}