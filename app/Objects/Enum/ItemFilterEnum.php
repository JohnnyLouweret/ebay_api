<?php

namespace App\Objects\Enum;

class ItemFilterEnum extends Enum
{
    /**
     * Options
     */
    const PARAMETER_PRICE_MIN = 'price_min';
    const PARAMETER_PRICE_MAX = 'price_max';

    /**
     * Ebay options
     */
    const EBAY_MIN_PRICE = 'MinPrice';
    const EBAY_MAX_PRICE = 'MaxPrice';

    /**
     * Type
     */
    const TYPE_NONE = 'none';
    const TYPE_PRICE = 'price';

    /**
     * @var string[]
     */
    protected static $options = [
        self::PARAMETER_PRICE_MIN,
        self::PARAMETER_PRICE_MAX,
    ];

    /**
     * @var string[]
     */
    protected static $ebayOptions = [
        self::PARAMETER_PRICE_MIN => self::EBAY_MIN_PRICE,
        self::PARAMETER_PRICE_MAX => self::EBAY_MAX_PRICE
    ];

    /**
     * @var string[]
     */
    protected static $type = [
        self::PARAMETER_PRICE_MIN => self::TYPE_PRICE,
        self::PARAMETER_PRICE_MAX => self::TYPE_PRICE
    ];

    /**
     * @return string
     */
    public function getSelfEbayOption(): string
    {
        return self::$ebayOptions[$this->value];
    }

    /**
     * @param string $name
     *
     * @return string
     */
    public static function getEbayName(string $name): string
    {
        return self::$ebayOptions[$name];
    }

    /**
     * @return string
     */
    public function getSelfType(): string
    {
        return self::$type[$this->value];
    }

    /**
     * @param string $type
     *
     * @return string
     */
    public static function getType(string $type): string
    {
        return self::$type[$type];
    }

    /**
     * @return bool
     */
    public function isMaxPrice(): bool
    {
        return $this->value === self::PARAMETER_PRICE_MAX;
    }
}
