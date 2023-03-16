<?php

$this->add('/cat/settings', 'Einkauf\Category\Controller\MainSettings', 'GET');

$this->add('/cat/settings', 'Einkauf\Category\Controller\MainSettings@newCat', 'POST');


$this->add('/cat/settings/edit/:id', 'Einkauf\Category\Controller\EditSettings', 'GET');

$this->add('/cat/settings/edit/:id', 'Einkauf\Category\Controller\EditSettings@editCat', 'POST');

$this->add('/cat/settings/delete/:id', 'Einkauf\Category\Controller\DeleteSettings', 'GET');