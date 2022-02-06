<?php

namespace App\ApiConnections;

use App\Objects\ApiRequest\ApiRequest;
use App\Objects\Enum\ProvidersEnum;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

abstract class ApiConnection
{
    /**
     * @var ProvidersEnum
     */
    protected $provider;

    /**
     * @param ProvidersEnum $providersEnum
     */
    public function __construct(ProvidersEnum $providersEnum)
    {
        $this->provider = $providersEnum;
    }

    /**
     * @param ApiRequest $apiRequest
     *
     * @return Response
     */
    protected function get(ApiRequest $apiRequest): Response
    {
        return Http::withHeaders($apiRequest->getHeader()->toArray())
            ->get($this->provider->getSelfExternalUrl(), $apiRequest->getQuery()->toArray());
    }
}
