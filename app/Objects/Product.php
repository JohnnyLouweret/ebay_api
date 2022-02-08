<?php

namespace App\Objects;

use App\Objects\Enum\ProvidersEnum;

class Product
{
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
     * @return array
     */
    public function toArray(): array
    {
        return [
            'provider' => $this->provider->getValue(),
            'item_id' => $this->itemId,
            'click_out_link' => $this->clickOutLink,
            'main_photo_url' => $this->mainPhotoUrl,
            'price' => $this->price,
            'price_currency' => $this->priceCurrency,
            'shipping_price' => $this->shippingPrice,
            'title' => $this->title,
            'description' => $this->description,
            'valid_until' => $this->validUntil,
            'brand' => $this->brand
        ];
    }
}
