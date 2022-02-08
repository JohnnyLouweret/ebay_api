<?php

namespace App\Objects;

use App\Objects\Enum\ProvidersEnum;

class Product
{
    const ARRAY_KEY_PROVIDER = 'provider';
    const ARRAY_KEY_ITEM_ID = 'item_id';
    const ARRAY_KEY_CLICK_OUT_LINK = 'click_out_link';
    const ARRAY_KEY_PHOTO_URL = 'main_photo_url';
    const ARRAY_KEY_PRICE = 'price';
    const ARRAY_KEY_PRICE_CURRENCY = 'price_currency';
    const ARRAY_KEY_SHIPPING_PRICE = 'shipping_price';
    const ARRAY_KEY_TITLE = 'title';
    const ARRAY_KEY_DESCRIPTION = 'description';
    const ARRAY_KEY_VALID_UNTIL = 'valid_until';
    const ARRAY_KEY_BRAND = 'brand';

    /**
     * @var ProvidersEnum
     */
    public $provider;

    /**
     * @var string|null
     */
    public $itemId;

    /**
     * @var string|null
     */
    public $clickOutLink;

    /**
     * @var string|null
     */
    public $mainPhotoUrl;

    /**
     * @var string|null
     */
    public $price;

    /**
     * @var string|null
     */
    public $priceCurrency;

    /**
     * @var string|null
     */
    public $shippingPrice;

    /**
     * @var string|null
     */
    public $title;

    /**
     * @var string|null
     */
    public $description;

    /**
     * @var string|null
     */
    public $validUntil;

    /**
     * @var string|null
     */
    public $brand;

    /**
     * @param ProvidersEnum $provider
     */
    public function __construct(ProvidersEnum $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @param ProvidersEnum $provider
     * @param array         $response
     *
     * @return Product
     */
    public static function create(ProvidersEnum $provider, array $response): Product
    {
        $product = new self($provider);

        if (array_key_exists(self::ARRAY_KEY_ITEM_ID, $response)) {
            $product->itemId = $response[self::ARRAY_KEY_ITEM_ID];
        }

        if (array_key_exists(self::ARRAY_KEY_CLICK_OUT_LINK, $response)) {
            $product->clickOutLink = $response[self::ARRAY_KEY_CLICK_OUT_LINK];
        }

        if (array_key_exists(self::ARRAY_KEY_PHOTO_URL, $response)) {
            $product->mainPhotoUrl = $response[self::ARRAY_KEY_PHOTO_URL];
        }

            if (array_key_exists(self::ARRAY_KEY_PRICE, $response)) {
                $product->price = $response[self::ARRAY_KEY_PRICE];
            }
            if (array_key_exists(self::ARRAY_KEY_PRICE_CURRENCY, $response)) {
                $product->priceCurrency = $response[self::ARRAY_KEY_PRICE_CURRENCY];
            }

        if (array_key_exists(self::ARRAY_KEY_SHIPPING_PRICE, $response)) {
            $product->shippingPrice = $response[self::ARRAY_KEY_SHIPPING_PRICE];
        }

        if (array_key_exists(self::ARRAY_KEY_TITLE, $response)) {
            $product->title = $response[self::ARRAY_KEY_TITLE];
        }

        if (array_key_exists(self::ARRAY_KEY_DESCRIPTION, $response)) {
            $product->description = $response[self::ARRAY_KEY_DESCRIPTION];
        }

        if (array_key_exists(self::ARRAY_KEY_BRAND, $response)) {
            $product->brand = $response[self::ARRAY_KEY_BRAND];
        }

        return $product;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            self::ARRAY_KEY_PROVIDER => $this->provider->getValue(),
            self::ARRAY_KEY_ITEM_ID => $this->itemId,
            self::ARRAY_KEY_CLICK_OUT_LINK => $this->clickOutLink,
            self::ARRAY_KEY_PHOTO_URL => $this->mainPhotoUrl,
            self::ARRAY_KEY_PRICE => $this->price,
            self::ARRAY_KEY_PRICE_CURRENCY => $this->priceCurrency,
            self::ARRAY_KEY_SHIPPING_PRICE => $this->shippingPrice,
            self::ARRAY_KEY_TITLE => $this->title,
            self::ARRAY_KEY_DESCRIPTION => $this->description,
            self::ARRAY_KEY_VALID_UNTIL => $this->validUntil,
            self::ARRAY_KEY_BRAND => $this->brand
        ];
    }
}
