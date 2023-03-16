<?php

namespace App\Einkauf\Shop\Repository;

use App\Einkauf\Shop\Model\ShopModel;
use Foundation\Database\Database;

class EditSettingsRepository
{
    public function getShopByID($id): array
    {
        $db = new Database('EinkaufShop');
        $dbResult = $db->select()->where("id", "=", ":id")->args([':id' => $id])->run();
        $result[] = new ShopModel($dbResult['id'], $dbResult['name']);
        return $result;
    }

    public function updateCatByID(int $id, string $name) :bool
    {
        $db = new Database('EinkaufShop');
        return $db->update(['name'])->where("id", "=", ":id")->args([':name' => $name, ':id' => $id ])->run();
    }
}