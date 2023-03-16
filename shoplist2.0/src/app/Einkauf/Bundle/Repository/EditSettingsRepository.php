<?php

namespace App\Einkauf\Bundle\Repository;

use App\Einkauf\Bundle\Model\BundleModel;
use Foundation\Database\Database;

class EditSettingsRepository
{
    public function getBundleByID($id): array
    {
        $db = new Database('EinkaufBundle');
        $dbResult = $db->select()->where("id", "=", ":id")->args([':id' => $id])->run();
        $result[] = new BundleModel($dbResult['id'], $dbResult['name']);
        return $result;
    }

    public function updateBundleByID(int $id, string $name): bool
    {
        $db = new Database('EinkaufBundle');
        return $db->update(['name'])->where("id", "=", ":id")->args([':name' => $name, ':id' => $id])->run();
    }
}