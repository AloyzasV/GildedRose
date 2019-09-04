<?php

namespace App;

class Conjured extends GildedRose
{
    public $items = [];

    public function __construct($items) {
        $this->items = $items;
    }

    public function updateQuality()
    {
       
    }
}