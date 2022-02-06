<?php

namespace App\Utility;

class StringUtility
{
    /**
     * @param $string
     *
     * @return bool
     */
    public static function isStringAndNotEmpty($string): bool
    {
        return is_string($string) && '' !== $string;
    }

    /**
     * @param string $input
     *
     * @return string
     */
    public static function snakeToCamel(string $input): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
    }
}
