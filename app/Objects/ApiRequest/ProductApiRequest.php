<?php

namespace App\Objects\ApiRequest;

use App\Objects\ApiQuery\ProductQuery;
use Illuminate\Support\Collection;

class ProductApiRequest extends ApiRequest
{
    /**
     * @param Collection $collect
     *
     * @return ProductApiRequest
     */
    public static function createFromQueryCollection(Collection $collect): ProductApiRequest
    {
        return new self(ProductQuery::createFromCollection($collect));
    }
}
