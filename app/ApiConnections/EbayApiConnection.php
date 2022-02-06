<?php

namespace App\ApiConnections;

use App\ApiConnections\Interfaces\ApiProductInterface;
use App\Objects\ApiHeaders\EbayHeaders;
use App\Objects\ApiRequest\ProductApiRequest;
use Illuminate\Http\Client\Response;

class EbayApiConnection extends ApiConnection implements ApiProductInterface
{
    /**
     * @param ProductApiRequest $productApiRequest
     *
     * @return Response
     */
    public function getProduct(ProductApiRequest $productApiRequest): Response
    {
        $productApiRequest->setHeader(EbayHeaders::createWithAuthentication(env('EBAY_KEY')));

        return self::get($productApiRequest);
    }
}
