<?php

namespace App\Objects\ApiQuery;

use App\Collection\ItemFilterCollection;
use App\Objects\Enum\ItemFilterEnum;
use App\Objects\Enum\SortOrderEnum;
use App\Objects\ItemFilter;
use App\Objects\SortOrder;
use App\Utility\ItemFilterUtility;
use Exception;

class ProductQuery extends Query
{
    const KEYWORDS = 'keywords';
    const SORT = 'sorting';

    /**
     * @var string|null
     */
    private $keywords;

    /**
     * @var ItemFilterCollection
     */
    private $itemFilters;

    /**
     * @var SortOrder
     */
    private $sortOrder;

    private function __construct()
    {
        $this->itemFilters = new ItemFilterCollection();
    }

    /**
     * @param array $query
     *
     * @return ProductQuery
     * @throws Exception
     */
    public static function createFromQuery(array $query): ProductQuery
    {
        $productQuery = new self();

        foreach ($query as $key => $value) {
            if ($key === self::KEYWORDS) {
                $productQuery->keywords = $value;

            } else if (ItemFilterEnum::isValidOption($key)) {
                $productQuery->itemFilters->add(ItemFilter::create(new ItemFilterEnum($key), $value));

            } else if ($key === self::SORT && SortOrderEnum::isValidOption($value)) {
                $productQuery->sortOrder = SortOrder::create(new SortOrderEnum($value));
            }
        }

        return $productQuery;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $array = [self::KEYWORDS => $this->keywords];

        foreach ($this->itemFilters->getItems() as $key => $item) {
            $array[ItemFilterUtility::getName($key)] = $item->getName()->getSelfEbayOption();
            $array[ItemFilterUtility::getValue($key)] = $item->getValue();
        }

        if ($this->sortOrder instanceof SortOrder) {
            $array[$this->sortOrder->getName()] = $this->sortOrder->getValue()->getSelfEbayOption();
        }

        return $array;
    }
}
