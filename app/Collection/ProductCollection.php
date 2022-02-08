<?php

namespace App\Collection;

use App\Objects\Parser\EbayParser;
use App\Objects\Product;

class ProductCollection
{
    /**
     * @var Product[]
     */
    protected $items = [];

    public function add(Product $itemFilter)
    {
        $this->items[] = $itemFilter;
    }

    /**
     * @return Product[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $products
     *
     * @return ProductCollection
     */
    public static function createFromArray(array $products): ProductCollection
    {
        $collection = new self();

        foreach ($products as $product) {
            $collection->add(EbayParser::createProductFromEbayResponse($product));
        }

        return $collection;
    }

    /**
     * @return bool
     */
    public function isNotEmpty(): bool
    {
        return false === $this->isEmpty();
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        if (count($this->items) === 0) {
            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];

        foreach ($this->items as $product) {
            $result[] = $product->toArray();
        }

        return $result;
    }
}
