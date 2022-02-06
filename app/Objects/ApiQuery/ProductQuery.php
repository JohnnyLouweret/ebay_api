<?php

namespace App\Objects\ApiQuery;

use App\Objects\Enum\QueryParametersEnum;
use App\Utility\ArrayUtility;
use App\Utility\StringUtility;
use Illuminate\Support\Collection;

class ProductQuery implements ApiQueryInterface
{
    /**
     * @var string
     */
    private $keywords;

    /**
     * @var int
     */
    private $priceMin;

    /**
     * @var int
     */
    private $priceMax;

    /**
     * @var
     */
    private $sorting;

    /**
     * @param Collection $collection
     *
     * @return ProductQuery
     */
    public static function createFromCollection(Collection $collection): ProductQuery
    {
        $query = new self();

        foreach ($collection->toArray() as $key => $value) {

            if (ArrayUtility::inArrayAndNotEmptyString(QueryParametersEnum::getOptions(), $key)) {

                $camelProperty = StringUtility::snakeToCamel($key);

                if (property_exists($query, $camelProperty)) {
                    $query->{$camelProperty} = $value;
                }
            }
        }

        return $query;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $array = [];

        foreach (QueryParametersEnum::getOptions() as $key) {

            $camelProperty = StringUtility::snakeToCamel($key);

            if (property_exists($this, $camelProperty)) {
                $array[$key] = $this->{$camelProperty};
            }
        }

        return $array;
    }
}
