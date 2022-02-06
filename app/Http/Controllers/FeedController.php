<?php

namespace App\Http\Controllers;

use App\ApiConnections\ApiConnection;
use App\ApiConnections\Factory\ApiConnectionFactory;
use App\Exceptions\UnknownPropertyException;
use App\Exceptions\UnsupportedProviderException;
use App\Objects\ApiRequest\ProductApiRequest;
use App\Objects\Enum\ProvidersEnum;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class FeedController extends BaseController
{
    /**
     * @var ApiConnection
     */
    private $apiConnection;

    /**
     * @param ApiConnectionFactory $apiConnectionFactory
     *
     * @throws UnsupportedProviderException
     */
    public function __construct(ApiConnectionFactory $apiConnectionFactory)
    {
        $this->apiConnection = $apiConnectionFactory::createForProvider(
            ProvidersEnum::createEbay()
        );
    }

    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        $productResponse = $this->apiConnection->getProduct(
            ProductApiRequest::createFromQueryCollection($request->collect())
        );
    }
}
