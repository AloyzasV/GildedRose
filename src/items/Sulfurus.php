<?php

namespace App\Items;

class Sulfurus extends StandardItem
{
    public function update()
    {
        $this->updateQuality();
    }
    
    protected function updateQuality()
    {
        $this->quality = 80;
    }
}