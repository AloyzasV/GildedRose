<?php

namespace App;

class Backstage extends GildedRose
{
    public $items = [];

    public function __construct($items) {
        $this->items = $items;
    }

    public function updateQuality()
    {
        foreach ($this->items as $item) {
            $item->sell_in -= 1;
            if ($item->sell_in < 0) {
                return $item->quality = 0;
            }
            $item->quality += 1;
            if ($item->sell_in < 10) {
                $item->quality += 1;
            }
            if ($item->sell_in < 5) {
                $item->quality += 1;
            }
            if ($item->quality > 50) {
                $item->quality = 50;
            }
        }
    }

}