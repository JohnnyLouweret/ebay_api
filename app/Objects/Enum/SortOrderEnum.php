<?php

namespace App\Objects\Enum;

class SortOrderEnum extends Enum
{
    /**
     * Options
     */
    const PARAMETER_PRICE_ASC = 'by_price_asc';
    const PARAMETER_DEFAULT = 'default';

    /**
     * Ebay options
     */
    const EBAY_PRICE_ASC = 'PricePlusShippingLowest';
    const EBAY_DEFAULT = 'BestMatch';

    /**
     * @var string[]
     */
    protected static $options = [
        self::PARAMETER_PRICE_ASC,
        self::PARAMETER_DEFAULT
    ];

    /**
     * @var string[]
     */
    protected static $ebayOptions = [
        self::PARAMETER_PRICE_ASC => self::EBAY_PRICE_ASC,
        self::PARAMETER_DEFAULT => self::EBAY_DEFAULT
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
}
