<?php

namespace App\Objects\Enum;

class QueryParametersEnum extends Enum
{
    /**
     * Options
     */
    const PARAMETER_KEYWORDS = 'keywords';
    const PARAMETER_PRICE_MIN = 'price_min';
    const PARAMETER_PRICE_MAX = 'price_max';
    const PARAMETER_SORTING = 'sorting';

    /**
     * @var string[]
     */
    protected static $options = [
        self::PARAMETER_KEYWORDS,
        self::PARAMETER_PRICE_MIN,
        self::PARAMETER_PRICE_MAX,
        self::PARAMETER_SORTING

    ];
}
