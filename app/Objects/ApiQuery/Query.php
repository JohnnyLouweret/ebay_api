<?php

namespace App\Objects\ApiQuery;


abstract class Query implements ApiQueryInterface
{
    /**
     * @return string
     */
    public function toQueryString(): string
    {
        return http_build_query($this->toArray(), '', '&');
    }
}
