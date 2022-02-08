<?php

namespace App\Http\Controllers;

use App\Objects\ApiQuery\ProductQuery;
use App\Service\FeedProvider;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class FeedController extends BaseController
{
    /**
     * @var FeedProvider
     */
    private $feedProvider;

    /**
     * @param FeedProvider $feedProvider
     *
     */
    public function __construct(FeedProvider $feedProvider)
    {
        $this->feedProvider = $feedProvider;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function index(Request $request): JsonResponse
    {
        if (false === $request->has('keywords')) {
            return response()->json(['error' => 'Bad request'], 400);
        }

        $apiOperation = $this->feedProvider->getProductByKeyWords(
            ProductQuery::createFromQuery($request->query())
        );

        if ($apiOperation->succeeded()) {
            return response()->json([
                'data' => $apiOperation->getProducts()->toArray()
            ]);
        }

        return response()->json([
            'error' => $apiOperation->getError()
        ]);
    }
}
