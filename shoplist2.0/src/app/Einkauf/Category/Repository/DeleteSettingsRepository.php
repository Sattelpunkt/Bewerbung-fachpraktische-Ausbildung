<?php

namespace App\Einkauf\Category\Repository;

use Foundation\Database\Database;

class DeleteSettingsRepository
{

    public function deleteById($id): bool
    {
        $db = new Database('EinkaufCat');
        return $db->delete()->where("id", "=",":id")->args([':id' => $id])->run();
    }
}