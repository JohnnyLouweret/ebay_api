<?php

namespace App\ApiConnections\Interfaces;

use App\Objects\ApiRequest\ProductApiRequest;

interface ApiProductInterface
{
    /**
     * @param ProductApiRequest $productApiRequest
     *
     * @return mixed
     */
    public function getProduct(ProductApiRequest $productApiRequest);
}
