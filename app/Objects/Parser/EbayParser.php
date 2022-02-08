<?php

namespace App\Objects\Parser;

use App\Objects\Enum\ProvidersEnum;
use App\Objects\Product;
use Exception;

class EbayParser
{
    /**
     * Exceptions
     */
    const EXCEPTION_PARSING_FAILED = 'Response was valid, but data could not be parsed';

    /**
     * Fields
     */
    const FIELD_STATUS = 'ack';
    const FIELD_SEARCH_RESULT = 'searchResult';
    const FIELD_ITEM = 'item';

    /**
     * Product fields
     */
    const FIELD_ITEM_ID = 'itemId';
    const FIELD_CLICK_OUT_LINK = 'viewItemUrl';
    const FIELD_MAIN_PHOTO_URL = 'galleryURL';

    /** Shipping info information */
    const FIELD_SHIPPING_INFO = 'shippingInfo';
    const FIELD_SHIPPING_PRICE = 'shippingServiceCost';

    /** Price information */
    const FIELD_SELLING_STATUS = 'sellingStatus';
    const FIELD_PRICE = 'currentPrice';
    const FIELD_PRICE_CURRENCY = 'price_currency'; // Cannot find

    /** Product information */
    const FIELD_TITLE = 'title';
    const FIELD_DESCRIPTION = 'description'; // Cannot find
    const FIELD_BRAND = 'brand'; // Cannot find

    /**
     * Error fields
     */
    const FIELD_ERROR_MESSAGE = 'errorMessage';
    const FIELD_ERROR = 'error';
    const FIELD_MESSAGE = 'message';

    /**
     * @param array $result
     *
     * @return array
     * @throws Exception
     */
    public static function getProductsFromResult(array $result): array
    {
        if (
            array_key_exists(self::FIELD_SEARCH_RESULT, $result) &&
            array_key_exists(self::FIELD_ITEM, $result[self::FIELD_SEARCH_RESULT])
        ) {
            return $result[self::FIELD_SEARCH_RESULT][self::FIELD_ITEM];
        }

        throw new Exception(self::EXCEPTION_PARSING_FAILED);
    }

    /**
     * @param array $result
     *
     * @return string
     * @throws Exception
     */
    public static function getErrorMessageFromResult(array $result): string
    {
        if (
            array_key_exists(self::FIELD_ERROR_MESSAGE, $result) &&
            array_key_exists(self::FIELD_ERROR, $result[self::FIELD_ERROR_MESSAGE])
        ) {
            return $result[self::FIELD_ERROR_MESSAGE][self::FIELD_ERROR][self::FIELD_MESSAGE];
        }

        throw new Exception(self::EXCEPTION_PARSING_FAILED);
    }

    /**
     * @param array $result
     *
     * @return string
     * @throws Exception
     */
    public static function getStatusFromResult(array $result): string
    {
        if (array_key_exists(self::FIELD_STATUS, $result))
        {
            return $result[self::FIELD_STATUS];
        }

        throw new Exception(self::EXCEPTION_PARSING_FAILED);
    }

    /**
     * @param array $response
     *
     * @return Product
     */
    public static function createProductFromEbayResponse(array $response): Product
    {
        $product = new Product(ProvidersEnum::createEbay());

        if (array_key_exists(self::FIELD_ITEM_ID, $response)) {
            $product->itemId = $response[self::FIELD_ITEM_ID];
        }

        if (array_key_exists(self::FIELD_CLICK_OUT_LINK, $response)) {
            $product->clickOutLink = $response[self::FIELD_CLICK_OUT_LINK];
        }

        if (array_key_exists(self::FIELD_MAIN_PHOTO_URL, $response)) {
            $product->mainPhotoUrl = $response[self::FIELD_MAIN_PHOTO_URL];
        }

        if (array_key_exists(self::FIELD_SELLING_STATUS, $response)) {
            if (array_key_exists(self::FIELD_PRICE, $response[self::FIELD_SELLING_STATUS])) {
                $product->price = $response[self::FIELD_SELLING_STATUS][self::FIELD_PRICE];
            }
            if (array_key_exists(self::FIELD_PRICE_CURRENCY, $response[self::FIELD_SELLING_STATUS])) {
                $product->priceCurrency = $response[self::FIELD_SELLING_STATUS][self::FIELD_PRICE_CURRENCY];
            }
        }

        if (array_key_exists(self::FIELD_SHIPPING_INFO, $response)) {
            if (array_key_exists(self::FIELD_SHIPPING_PRICE, $response[self::FIELD_SHIPPING_INFO])) {
                $product->shippingPrice = $response[self::FIELD_SHIPPING_INFO][self::FIELD_SHIPPING_PRICE];
            }
        }

        if (array_key_exists(self::FIELD_TITLE, $response)) {
            $product->title = $response[self::FIELD_TITLE];
        }

        if (array_key_exists(self::FIELD_DESCRIPTION, $response)) {
            $product->description = $response[self::FIELD_DESCRIPTION];
        }

        if (array_key_exists(self::FIELD_BRAND, $response)) {
            $product->brand = $response[self::FIELD_BRAND];
        }

        return $product;
    }

    /**
     * @param $product
     */
    public static function createProductFromCache($product)
    {
        return Product::create(ProvidersEnum::createEbay(), $product);
    }
}
