<?php

namespace App\Service;

use App\ApiConnections\ApiConnection;
use App\Objects\ApiQuery\ProductQuery;
use App\Objects\ApiRequest\ProductApiRequest;
use App\Objects\Operation;
use App\Utility\CacheUtility;
use Exception;
use Illuminate\Support\Facades\Cache;

class FeedProvider
{
    /**
     * @var ApiConnection
     */
    private $apiConnection;

    /**
     * @param ApiConnection $apiConnection
     */
    public function __construct(
        ApiConnection $apiConnection
    ) {
        $this->apiConnection = $apiConnection;
    }

    /**
     * @param ProductQuery $productQuery
     *
     * @return Operation
     * @throws Exception
     */
    public function getProductByKeyWords(ProductQuery $productQuery): Operation
    {
        $operation = new Operation();

       if (Cache::has($productQuery->toQueryString())) {
           $products = CacheUtility::retrieveProducts($productQuery);
           $operation->setProducts($products);

        } else {
            $operation = $this->apiConnection->getProduct(
                ProductApiRequest::createFromQuery($productQuery)
            );

            if ($operation->succeeded()) {
                CacheUtility::storeProducts($productQuery->toQueryString(), $operation->getProducts());
            }
        }

        return $operation;
    }
}
