<?php

namespace App\Utility;

use App\Collection\ProductCollection;
use App\Objects\ApiQuery\ProductQuery;
use Illuminate\Support\Facades\Cache;

class CacheUtility
{
    const EXPIRATION = 1000;

    /**
     * @param ProductQuery $queryString
     *
     * @return ProductCollection
     */
    public static function retrieveProducts(ProductQuery $queryString): ProductCollection
    {
        $products = Cache::get($queryString->toQueryString());

        return ProductCollection::createFromArray($products);
    }

    /**
     * @param string            $key
     * @param ProductCollection $items
     *
     * @return void
     */
    public static function storeProducts(string $key, ProductCollection $items): void
    {
        Cache::put($key, $items->toArray(), self::EXPIRATION);
    }
}
