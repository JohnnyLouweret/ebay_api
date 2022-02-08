<?php

namespace App\Utility;

class ItemFilterUtility
{
    const ITEM_FILTER = 'itemFilter';
    const ITEM_FILTER_NAME = 'name';
    const ITEM_FILTER_VALUE = 'value';

    /**
     * @param int $index
     *
     * @return string
     */
    public static function getName(int $index): string
    {
        return self::ITEM_FILTER . '(' . $index . ').' . self::ITEM_FILTER_NAME;
    }

    /**
     * @param int $index
     *
     * @return string
     */
    public static function getValue(int $index): string
    {
        return self::ITEM_FILTER . '(' . $index . ').' . self::ITEM_FILTER_VALUE;
    }
}
