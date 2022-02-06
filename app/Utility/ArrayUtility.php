<?php

namespace App\Utility;

class ArrayUtility
{
    /**
     * @param array  $array
     * @param string $key
     *
     * @return bool
     */
    public static function inArrayAndNotEmptyString(
        array $array,
        string $key
    ): bool {
        return in_array($key, $array) && StringUtility::isStringAndNotEmpty($key);
    }
}
