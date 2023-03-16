<?php

namespace App\Einkauf\Shop\Repository;

use App\Einkauf\Shop\Model\ShopModel;
use Foundation\Database\Database;

class MainSettingsRepository
{
    public function getAll(): array
    {
        $db = new Database('EinkaufShop');
        $dbresult = $db->select()->run();
        foreach ($dbresult as $value) {
            $result[] = new ShopModel($value['id'], $value['name']);
        }
        return $result;
    }

    public function newShop($name): bool
    {
        $db = new Database('EinkaufShop');
        $args = [':name' => $name];
        return $db->insert(['name'])->args($args)->run();
    }
}