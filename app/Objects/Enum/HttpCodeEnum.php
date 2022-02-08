<?php

namespace App\Objects\Enum;

class HttpCodeEnum extends Enum
{
    /**
     * Options
     */
    const HTTP_OK = 200;
    const HTTP_INTERNAL_SERVER_ERROR = 500;

    /**
     * @var string[]
     */
    protected static $options = [
        self::HTTP_OK,
        self::HTTP_INTERNAL_SERVER_ERROR
    ];
}
