<?php

namespace App\Objects\ApiHeaders;

class EbayHeaders implements ApiHeaderInterface
{
    const KEY_AUTHENTICATION = 'X-EBAY-SOA-SECURITY-APPNAME';
    const KEY_OPERATION_NAME = 'X-EBAY-SOA-OPERATION-NAME';
    const KEY_VERSION = 'X-EBAY-SOA-SERVICE-VERSION';
    const KEY_GLOBAL_ID = 'X-EBAY-SOA-GLOBAL-ID';

    /**
     * Header values.
     */
    const VALUE_OPERATION_NAME = 'findItemsByKeywords';
    const VALUE_VERSION = '1.13.0';
    const VALUE_GLOBAL_ID = 'EBAY-US';

    /**
     * @var string
     */
    private $key;

    /**
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * @param string $key
     *
     * @return EbayHeaders
     */
    public static function createWithAuthentication(string $key): EbayHeaders
    {
        return new self($key);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            self::KEY_AUTHENTICATION => $this->key,
            self::KEY_OPERATION_NAME => self::VALUE_OPERATION_NAME,
            self::KEY_VERSION => self::VALUE_VERSION,
            self::KEY_GLOBAL_ID => self::VALUE_GLOBAL_ID
        ];
    }
}
