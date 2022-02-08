<?php

namespace App\Collection;

use App\Objects\ItemFilter;

class ItemFilterCollection
{
    /**
     * @var ItemFilter[]
     */
    protected $items = [];

    public function add(ItemFilter $itemFilter)
    {
        $this->items[] = $itemFilter;
    }

    /**
     * @return ItemFilter[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
