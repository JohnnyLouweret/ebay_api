<?php

namespace App\Objects\ApiQuery;

interface ApiQueryInterface
{
    /**
     * @return array
     */
    public function toArray(): array;
}
