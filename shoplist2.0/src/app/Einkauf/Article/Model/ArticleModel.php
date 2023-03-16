<?php

namespace App\Einkauf\Article\Model;

class ArticleModel
{
    private int $id;
    private string $anzahl;
    private string $name;
    private string $bundle;
    private string $shop;
    private string $cat;
    private int $catID;
    private int $bundleID;
    private int $shopID;

    public function __construct(int $id, string $anzahl, string $name, string $bundle, string $shop, string $cat, int $catID = 0, int $bundleID = 0, int $shopID = 0)
    {
        $this->id = $id;
        $this->anzahl = $anzahl;
        $this->name = $name;
        $this->bundle = $bundle;
        $this->shop = $shop;
        $this->cat = $cat;
        $this->catID = $catID;
        $this->bundleID = $bundleID;
        $this->shopID = $shopID;
    }

    public function getShopID(): int
    {
        return $this->shopID;
    }


    public function getCatID(): string
    {
        return $this->catID;
    }

    public function getBundleID(): string
    {
        return $this->bundleID;
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function getAnzahl(): string
    {
        return $this->anzahl;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getBundle(): string
    {
        return $this->bundle;
    }


    public function getShop(): string
    {
        return $this->shop;
    }


    public function getCat(): string
    {
        return $this->cat;
    }


}