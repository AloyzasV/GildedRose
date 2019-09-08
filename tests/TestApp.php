<?php

namespace GildedRoseTests;

use \PHPUnit\Framework\TestCase;
use App\GildedRose;

class TestApp extends TestCase
{
    public function getUpdatedItem($name, $sell_in, $quality)
    {
        $class = GildedRose::getItemClass($name);
        $item = new $class($name, $sell_in, $quality);
       
        $app = new GildedRose([$item]);
        $app->updateQuality();
        return $item;
    }
}
