<?php

namespace App;

class Sulfurus extends GildedRose
{
    public $items = [];

    public function __construct($items) {
        $this->items = $items;
    }

    public function updateQuality()
    {
        foreach ($this->items as $item) {
            $item->quality = 80;
        }
    }

}