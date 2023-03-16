<?php

namespace App\Einkauf\Bundle\Repository;

use App\Einkauf\Bundle\Model\BundleModel;
use Foundation\Database\Database;

class MainSettingsRepository
{
    public function getAll(): array
    {
        $db = new Database('EinkaufBundle');
        $dbresult = $db->select()->run();
        foreach ($dbresult as $value) {
            $result[] = new BundleModel($value['id'], $value['name']);
        }
        return $result;
    }

    public function newBundle($name): bool
    {
        $db = new Database('EinkaufBundle');
        $args = [':name' => $name];
        return $db->insert(['name'])->args($args)->run();
    }
}