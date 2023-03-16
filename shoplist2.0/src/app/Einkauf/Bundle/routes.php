<?php

$this->add('/bundle/settings', 'Einkauf\Bundle\Controller\MainSettings', 'GET');
$this->add('/bundle/settings', 'Einkauf\Bundle\Controller\MainSettings@newBundle', 'POST');


$this->add('/bundle/settings/edit/:id', 'Einkauf\Bundle\Controller\EditSettings', 'GET');
$this->add('/bundle/settings/edit/:id', 'Einkauf\Bundle\Controller\EditSettings@editBundle', 'POST');

$this->add('/bundle/settings/delete/:id', 'Einkauf\Bundle\Controller\DeleteSettings', 'GET');