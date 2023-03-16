<?php

$this->add('/', 'Einkauf\Article\Controller\Home', 'GET');

$this->add('/article/new', 'Einkauf\Article\Controller\New', 'GET');

$this->add('/article/new', 'Einkauf\Article\Controller\New@insert', 'POST');

$this->add('/article/edit/:id', 'Einkauf\Article\Controller\Edit', 'GET');
