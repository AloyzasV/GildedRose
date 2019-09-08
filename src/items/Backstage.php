<?php

namespace App\Items;

class Backstage extends StandardItem
{
    protected function updateQuality()
    {
        if ($this->sell_in > 10) {
            $this->quality += 1;
        } elseif ($this->sell_in <= 10 and $this->sell_in > 5) {
            $this->quality += 2;
        } elseif ($this->sell_in <= 5 and $this->sell_in > 0) {
            $this->quality += 3;
        } else {
            $this->quality = 0;
        }
        
        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }
}