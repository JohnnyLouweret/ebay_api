<?php

namespace App\Objects\ApiRequest;

use App\Objects\ApiHeaders\ApiHeaderInterface;
use App\Objects\ApiQuery\ApiQueryInterface;
use App\Objects\ApiQuery\Query;

abstract class ApiRequest
{
    /**
     * @var ApiQueryInterface
     */
    protected $query;

    /**
     * @var ApiHeaderInterface
     */
    protected $header;

    /**
     * @param ApiQueryInterface  $apiQuery
     */
    public function __construct(
        ApiQueryInterface $apiQuery
    ) {
        $this->query = $apiQuery;
    }

    /**
     * @return Query
     */
    public function getQuery(): Query
    {
        return $this->query;
    }

    /**
     * @return ApiHeaderInterface
     */
    public function getHeader(): ApiHeaderInterface
    {
        return $this->header;
    }

    /**
     * @param ApiQueryInterface $query
     *
     * @return ApiRequest
     */
    public function setQuery(ApiQueryInterface $query): ApiRequest
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @param ApiHeaderInterface $header
     *
     * @return ApiRequest
     */
    public function setHeader(ApiHeaderInterface $header): ApiRequest
    {
        $this->header = $header;

        return $this;
    }
}
