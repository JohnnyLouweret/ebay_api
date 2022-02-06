<?php

namespace App\Exceptions;

use App\Objects\Enum\ProvidersEnum;
use Exception;

class UnsupportedProviderException extends Exception
{
    /**
     * Exception Message.
     */
    const EXCEPTION_UNSUPPORTED_PROVIDER = '[%s] provider is not yet supported.';

    /**
     * @param ProvidersEnum $providersEnum
     */
    public function __construct(ProvidersEnum $providersEnum)
    {
        parent::__construct(sprintf(
            self::EXCEPTION_UNSUPPORTED_PROVIDER, $providersEnum->getValue()
        ), 500);
    }
}
