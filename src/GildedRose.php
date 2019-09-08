<?php

namespace App;

class GildedRose
{
    public $items = [];

    public static $itemClasses = [
        'Aged Brie' => Items\AgedBrie::class,
        'Backstage passes to a TAFKAL80ETC concert' => Items\Backstage::class,
        'Sulfuras, Hand of Ragnaros' => Items\Sulfurus::class,
        'Conjured Mana Cake' => Items\Conjured::class
    ];

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function updateQuality()
    {
        foreach ($this->items as $item) {
            $item->update();
        }
    }

    public function getItemClass($itemName)
    {
        if (array_key_exists($itemName, self::$itemClasses)) {
            $class = self::$itemClasses[$itemName];
        } else {
            $class = Items\StandardItem::class;
        }
        return $class;
    }
}

