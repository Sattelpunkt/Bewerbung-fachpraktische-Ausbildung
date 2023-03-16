<?php

namespace App\Einkauf\Bundle\Repository;
use Foundation\Database\Database;

class DeleteSettingsRepository
{

    public function deleteById($id): bool
    {
        $db = new Database('EinkaufBundle');
        return $db->delete()->where("id", "=",":id")->args([':id' => $id])->run();
    }
}