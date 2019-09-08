<?php

namespace App\Items;

class AgedBrie extends StandardItem
{
    protected function updateQuality()
    {
        if ($this->sell_in > 0) {
            $this->quality += 1;
        } else {
            $this->quality += 2;
        }
        
        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }
}