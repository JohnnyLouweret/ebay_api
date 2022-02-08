<?php

namespace App\Objects;

use App\Collection\ProductCollection;

class Operation
{
    /**
     * @var string|null
     */
    private $error;

    /**
     * @var ProductCollection
     */
    private $products;

    /**
     * @return string|null
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * @return bool
     */
    public function succeeded(): bool
    {
        return false === is_string($this->error) && $this->getProducts()->isNotEmpty();
    }

    /**
     * @param mixed $error
     */
    public function setError($error): void
    {
        $this->error = $error;
    }

    /**
     * @param ProductCollection $products
     *
     * @return Operation
     */
    public function setProducts(ProductCollection $products): Operation
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @return ProductCollection
     */
    public function getProducts(): ProductCollection
    {
        return $this->products;
    }
}
