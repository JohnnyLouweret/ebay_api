<?php

namespace App\Objects;

use App\Objects\Enum\SortOrderEnum;

class SortOrder
{
    /**
     * @var string
     */
    private $name = 'sortOrder';

    /**
     * @var SortOrderEnum
     */
    private $value;

    /**
     * @param SortOrderEnum $value
     */
    private function __construct(SortOrderEnum $value)
    {
        $this->value = $value;
    }

    /**
     * @param SortOrderEnum $value
     *
     * @return SortOrder
     */
    public static function create(SortOrderEnum $value): SortOrder
    {
        return new self($value);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return SortOrderEnum
     */
    public function getValue(): SortOrderEnum
    {
        return $this->value;
    }
}
