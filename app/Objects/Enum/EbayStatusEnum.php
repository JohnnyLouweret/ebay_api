<?php

namespace App\Objects\Enum;

class EbayStatusEnum extends Enum
{
    /**
     * Options
     */
    const STATUS_SUCCESS = 'Success';
    const STATUS_FAILURE = 'Failure';

    /**
     * @var string[]
     */
    protected static $options = [
        self::STATUS_SUCCESS,
        self::STATUS_FAILURE
    ];
}
