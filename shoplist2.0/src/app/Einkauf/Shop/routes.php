<?php

$this->add('/shop/settings', 'Einkauf\Shop\Controller\MainSettings', 'GET');
$this->add('/shop/settings', 'Einkauf\Shop\Controller\MainSettings@newShop', 'POST');


$this->add('/shop/settings/edit/:id', 'Einkauf\Shop\Controller\EditSettings', 'GET');
$this->add('/shop/settings/edit/:id', 'Einkauf\Shop\Controller\EditSettings@editCat', 'POST');

$this->add('/shop/settings/delete/:id', 'Einkauf\Shop\Controller\DeleteSettings', 'GET');