<?php

namespace App\Objects\Enum;

class ProvidersEnum extends Enum
{
    /**
     * Options
     */
    const PROVIDER_EBAY = 'ebay';
    const PROVIDER_AMAZON = 'amazon';

    /**
     * External Urls.
     */
    const PROVIDER_EBAY_EXTERNAL_URL = 'http://svcs.sandbox.ebay.com/services/search/FindingService/v1';
    const PROVIDER_AMAZON_EXTERNAL_URL = '';

    /**
     * @var string[]
     */
    protected static $options = [
        self::PROVIDER_EBAY,
        self::PROVIDER_AMAZON
    ];

    /**
     * @var string[]
     */
    protected static $externalUrls = [
        self::PROVIDER_EBAY => self::PROVIDER_EBAY_EXTERNAL_URL,
        self::PROVIDER_AMAZON => self::PROVIDER_AMAZON_EXTERNAL_URL
    ];

    /**
     * @return string
     */
    public function getSelfExternalUrl(): string
    {
        return self::getExternalUrl($this->value);
    }

    /**
     * @param string|null $value
     *
     * @return string
     */
    public static function getExternalUrl(?string $value): string
    {
        if (is_null($value)) {
            return '';
        }

        if (!isset(static::$externalUrls[$value])) {
            return "Unknown type ($value)";
        }

        return static::$externalUrls[$value];
    }

    /**
     * @return self
     */
    public static function createEbay(): self
    {
        return new self(self::PROVIDER_EBAY);
    }

    /**
     * @return self
     */
    public static function createAmazon(): self
    {
        return new self(self::PROVIDER_AMAZON);
    }

    /**
     * @return bool
     */
    public function isEbay(): bool
    {
        return $this->value === self::PROVIDER_EBAY;
    }
}
