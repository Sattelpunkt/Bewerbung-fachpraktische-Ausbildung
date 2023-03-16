<?php

namespace App\Test\Controller;

use App\Test\Service\HomeService;
use Foundation\Bootstrap\FlashMessage;
use Foundation\Database\newDatabase;
use Foundation\Utils\D;

class HomeController
{


    public function indexAction(array $params, array $cleanData): void
    {
        //FlashMessage::add('danger', 'Keven ist der Beste');
        //$service = new HomeService();
        //$service->printTestTemplate();
        $db = new newDatabase('EinkaufCat');
        $result = $db->select(['name'])->where("id", "=",":id")->args([':id' => 1])->run();
        //$result = $db->delete()->where("id", "=", ":id")->args([':id' => 42])->run();
        //$result = $db->update(['name'])->where("id", "=", ":id")->args([':name' => 'Monic rieht gut', ':id' => 14 ])->run();
        //$result = $db->insert(['name'])->args([':name' => 'Eier'])->run();
        D::dnd($result);
    }
}