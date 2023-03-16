<?php

namespace App\Einkauf\Article\Repository;

use Foundation\Database\Database;

class NewRepository
{

    public function insertArticle(int $anzahl, int $bundle, string $name, int $cat, int $shop): bool
    {
        $db = new Database('EinkaufArticle');
        return $db->insert(['anzahl', 'bundle_id', 'name', 'cat_id', 'shop_id'])
            ->args([
                ':anzahl' => $anzahl,
                ':bundle_id' => $bundle,
                ':name' => $name,
                ':cat_id' => $cat,
                ':shop_id' => $shop
            ])->run();
    }

}