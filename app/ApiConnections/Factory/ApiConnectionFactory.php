<?php

namespace App\ApiConnections\Factory;

use App\ApiConnections\EbayApiConnection;
use App\Exceptions\UnsupportedProviderException;
use App\Objects\Enum\ProvidersEnum;

class ApiConnectionFactory
{
    /**
     * @param ProvidersEnum $providersEnum
     *
     * @return EbayApiConnection
     * @throws UnsupportedProviderException
     */
    public static function createForProvider(ProvidersEnum $providersEnum): EbayApiConnection
    {
        if ($providersEnum->isEbay()) {
            return new EbayApiConnection($providersEnum);
        }

        throw new UnsupportedProviderException($providersEnum);
    }
}
