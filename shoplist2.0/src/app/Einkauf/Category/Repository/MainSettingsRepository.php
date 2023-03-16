<?php

namespace App\Einkauf\Category\Repository;

use App\Einkauf\Category\Model\CategoryModel;
use Foundation\Database\Database;
use Foundation\Utils\D;

class MainSettingsRepository
{

    public function getAll(): array
    {
        $db = new Database('EinkaufCat');
        $dbResult = $db->select()->run();
        foreach ($dbResult as $value) {
            $result[] = new CategoryModel($value['id'], $value['name']);
        }

        return $result;
    }

    public function newCat($name): bool
    {
        $db = new Database('EinkaufCat');
        $args = [':name' => $name];
        return $db->insert(['name'])->args($args)->run();
    }
}