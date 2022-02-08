<?php

namespace App\Objects;

use App\Objects\Enum\ItemFilterEnum;

class ItemFilter
{
    /**
     * @var ItemFilterEnum
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * @param ItemFilterEnum $itemFilter
     * @param string         $value
     */
    private function __construct(ItemFilterEnum $itemFilter, string $value)
    {
        $this->name = $itemFilter;
        $this->value = $value;
    }

    /**
     * @param ItemFilterEnum $filterEnum
     * @param string         $value
     *
     * @return ItemFilter
     */
    public static function create(ItemFilterEnum $filterEnum, string $value): ItemFilter
    {
        return new self($filterEnum, $value);
    }

    /**
     * @return ItemFilterEnum
     */
    public function getName(): ItemFilterEnum
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
