<?php

namespace GildedRoseTests;

class GildedRoseTest extends TestApp
{
    public function testAgedBrieBeforeSell()
    {
        $item = $this->getUpdatedItem("Aged Brie", 8, 8);

        $this->assertEquals($item->sell_in, 7);
        $this->assertEquals($item->quality, 9);
    }

    public function testAgedBrieAfterSell()
    {
        $item = $this->getUpdatedItem("Aged Brie", -1, 8);

        $this->assertEquals($item->sell_in, -2);
        $this->assertEquals($item->quality, 10);
    }

    public function testAgedBrieOnSell()
    {
        $item = $this->getUpdatedItem("Aged Brie", 0, 8);
        
        $this->assertEquals($item->sell_in, -1);
        $this->assertEquals($item->quality, 10);
    }

    public function testAgedBrieBeforeSellWithMaxValue()
    {
        $item = $this->getUpdatedItem("Aged Brie", 8, 50);

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sell_in, 7);
    }

    public function testAgedBrieOnSellWithMaxValue()
    {
        $item = $this->getUpdatedItem("Aged Brie", 0, 50);

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sell_in, -1);
    }

    public function testAgedBrieAfterSellWithMaxValue()
    {
        $item = $this->getUpdatedItem("Aged Brie", -1, 50);

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sell_in, -2);
    }

    public function testBackstageBeforeSell()
    {
        $item = $this->getUpdatedItem("Backstage passes to a TAFKAL80ETC concert", 10, 10);

        $this->assertEquals($item->quality, 12);
        $this->assertEquals($item->sell_in, 9);
    }

    public function testBackstageBeforeTenDaysToSell()
    {
        $item = $this->getUpdatedItem("Backstage passes to a TAFKAL80ETC concert", 11, 10);

        $this->assertEquals($item->sell_in, 10);
        $this->assertEquals($item->quality, 11);
    }

    public function testBackstageCloseToSellDate()
    {
        $item = $this->getUpdatedItem("Backstage passes to a TAFKAL80ETC concert", 5, 10);

        $this->assertEquals($item->quality, 13);
        $this->assertEquals($item->sell_in, 4);
    }

    public function testBackstageDropToZeroOnSell()
    {
        $item = $this->getUpdatedItem("Backstage passes to a TAFKAL80ETC concert", 0, 10);

        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sell_in, -1);
    }
    public function testBackstageCloseToSellWithMax()
    {
        $item = $this->getUpdatedItem("Backstage passes to a TAFKAL80ETC concert", 10, 50);

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sell_in, 9);
    }

    public function testBackstageDropToZeroAfterSell()
    {
        $item = $this->getUpdatedItem("Backstage passes to a TAFKAL80ETC concert", -5, 50);

        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sell_in, -6);
    }

    public function testSulfurusBeforeSell()
    {
        $item = $this->getUpdatedItem("Sulfuras, Hand of Ragnaros", 10, 10);

        $this->assertEquals($item->sell_in, 10);
        $this->assertEquals($item->quality, 80);
    }

    public function testSulfurusOnSell()
    {
        $item = $this->getUpdatedItem("Sulfuras, Hand of Ragnaros", 0, 10);

        $this->assertEquals($item->sell_in, 0);
        $this->assertEquals($item->quality, 80);
    }

    public function testSulfurusAfterSell()
    {
        $item = $this->getUpdatedItem("Sulfuras, Hand of Ragnaros", -1, 10);

        $this->assertEquals($item->sell_in, -1);
        $this->assertEquals($item->quality, 80);
    }
    
    public function testStandardBeforeSellBy()
    {
        $item = $this->getUpdatedItem("Elixir of the Mongoose", 10, 10);

        $this->assertEquals(9, $item->sell_in);
        $this->assertEquals(9, $item->quality);
    }

    public function testStandardOnSell()
    {
        $item = $this->getUpdatedItem("Elixir of the Mongoose", 0, 10);

        $this->assertEquals(-1, $item->sell_in);
        $this->assertEquals(8, $item->quality);
    }

    public function testStandardAfterSell()
    {
        $item = $this->getUpdatedItem("Elixir of the Mongoose", -1, 10);

        $this->assertEquals(-2, $item->sell_in);
        $this->assertEquals(8, $item->quality);
    }

    public function testStandardWithZeroQuality()
    {
        $item = $this->getUpdatedItem("Elixir of the Mongoose", 10, 0);

        $this->assertEquals(9, $item->sell_in);
        $this->assertEquals(0, $item->quality);
    }

    public function testConjuredBeforeSell()
    {
        $item = $this->getUpdatedItem("Conjured Mana Cake", 10, 10);

        $this->assertEquals(9, $item->sell_in);
        $this->assertEquals(8, $item->quality);
    }

    public function testConjuredOnSell()
    {
        $item = $this->getUpdatedItem("Conjured Mana Cake", 0, 10);

        $this->assertEquals(-1, $item->sell_in);
        $this->assertEquals(6, $item->quality);
    }

    public function testConjuredAfterSell()
    {
        $item = $this->getUpdatedItem("Conjured Mana Cake", -1, 10);

        $this->assertEquals(-2, $item->sell_in);
        $this->assertEquals(6, $item->quality);
    }

    public function testConjuredWithZeroQuality()
    {
        $item = $this->getUpdatedItem("Conjured Mana Cake", 10, 0);

        $this->assertEquals(9, $item->sell_in);
        $this->assertEquals(0, $item->quality);
    }
}
