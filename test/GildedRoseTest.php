<?php

namespace App;

class GildedRoseTest extends \PHPUnit\Framework\TestCase
{
    public function testAgedBrieBeforeSell()
    {
        $items      = [new Item("Aged Brie", 8, 8)];
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sell_in, 7);
        $this->assertEquals($items[0]->quality, 9);
    }
    public function testAgedBrieAfterSell()
    {
        $items      = [new Item("Aged Brie", -1, 8)];  
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sell_in, -2);
        $this->assertEquals($items[0]->quality, 10);
    }
    public function testAgedBrieOnSell()
    {
        $items      = [new Item("Aged Brie", 0, 8)];
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sell_in, -1);
        $this->assertEquals($items[0]->quality, 10);
    }
    public function testAgedBrieBeforeSellWithMaxValue()
    {
        $items      = [new Item("Aged Brie", 8, 50)];
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 50);
        $this->assertEquals($items[0]->sell_in, 7);
    }
    public function testAgedBrieOnSellWithMaxValue()
    {
        $items      = [new Item("Aged Brie", 0, 50)];
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 50);
        $this->assertEquals($items[0]->sell_in, -1);
    }
    public function testAgedBrieAfterSellWithMaxValue()
    {
        $items      = [new Item("Aged Brie", -1, 50)];
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 50);
        $this->assertEquals($items[0]->sell_in, -2);
    }
    public function testBackstageBeforeSell()
    {
        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 10, 10)];
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sell_in, 9);
        $this->assertEquals($items[0]->quality, 12);
    }
    public function testBackstageBeforeTenDaysToSell()
    {
        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 11, 10)];
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 11);
        $this->assertEquals($items[0]->sell_in, 10);
    }
    public function testBackstageCloseToSellDate()
    {
        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 5, 10)];
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 13);
        $this->assertEquals($items[0]->sell_in, 4);
    }
    public function testBackstageDropToZeroOnSell()
    {
        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 0, 10)];
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 0);
        $this->assertEquals($items[0]->sell_in, -1);
    }
    public function testBackstageCloseToSellWithMax()
    {
        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 10, 50)];
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 50);
        $this->assertEquals($items[0]->sell_in, 9);
    }
    public function testBackstageDropToZeroAfterSell()
    {
        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", -5, 50)];
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 0);
        $this->assertEquals($items[0]->sell_in, -6);
    }
    public function testSulfurusBeforeSell()
    {
        $items      = [new Item("Sulfuras, Hand of Ragnaros", 10, 10)];
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sell_in, 10);
        $this->assertEquals($items[0]->quality, 80);
    }
    public function testSulfurusBeforeOnSell()
    {
        $items      = [new Item("Sulfuras, Hand of Ragnaros", 0, 10)];
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sell_in, 0);
        $this->assertEquals($items[0]->quality, 80);
    }
    public function testSulfurusAfterSell()
    {
        $items      = [new Item("Sulfuras, Hand of Ragnaros", -1, 10)];
        $gildedRose = GildedRose::type($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->sell_in, -1);
        $this->assertEquals($items[0]->quality, 80);
    }

}
