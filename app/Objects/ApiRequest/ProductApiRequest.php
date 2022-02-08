<?php

namespace App\Objects\ApiRequest;

use App\Objects\ApiQuery\ProductQuery;

class ProductApiRequest extends ApiRequest
{
    /**
     * @param ProductQuery $query
     *
     * @return ProductApiRequest
     */
    public static function createFromQuery(ProductQuery $query): ProductApiRequest
    {
        return new self($query);
    }
}
