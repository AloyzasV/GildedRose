<?php

namespace App;

class GildedRose
{
    protected static $productClasses = [
        'Aged Brie' => AgedBrie::class,
        'Backstage passes to a TAFKAL80ETC concert' => Backstage::class,
        'Sulfuras, Hand of Ragnaros' => Sulfurus::class,
        'Conjured' => Conjured::class
    ];

    public function type($items)
    {
        foreach ($items as $item) {
            if (array_key_exists($item->name, self::$productClasses)) {
                return new self::$productClasses[$item->name]($items);
            }
        }
        return new static($items);
    }
}

