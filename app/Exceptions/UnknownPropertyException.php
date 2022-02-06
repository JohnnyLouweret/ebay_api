<?php

namespace App\Exceptions;

use Exception;

class UnknownPropertyException extends Exception
{
    /**
     * Exception Message.
     */
    const EXCEPTION_UNKNOWN_PROPERTY = 'unknown property [%s] on class.';

    /**
     * @param string $property
     */
    public function __construct(string $property)
    {
        parent::__construct(sprintf(
            self::EXCEPTION_UNKNOWN_PROPERTY, $property
        ), 500);
    }
}
