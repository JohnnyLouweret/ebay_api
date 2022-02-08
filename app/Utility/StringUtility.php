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

    /**
     * @param string $json
     *
     * @return array
     */
    public static function jsonToArray(string $json): array
    {
        $array = json_decode($json,true);

        if (is_array($array)) {
            return $array;
        }

        return [];
    }
}
