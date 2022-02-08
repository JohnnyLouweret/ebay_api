<?php

namespace App\ApiConnections;

use App\ApiConnections\Interfaces\ApiProduct;
use App\Collection\ProductCollection;
use App\Objects\ApiHeaders\EbayHeaders;
use App\Objects\Operation;
use App\Objects\ApiRequest\ProductApiRequest;
use App\Objects\Enum\EbayStatusEnum;
use App\Objects\Enum\HttpCodeEnum;
use App\Objects\Parser\EbayParser;
use App\Utility\XmlUtility;
use Exception;

class EbayApiConnection extends ApiConnection implements ApiProduct
{
    /**
     * Errors.
     */
    const ERROR_SOMETHING_WENT_WRONG = 'something went wrong.';

    /**
     * @param ProductApiRequest $productApiRequest
     *
     * @return Operation
     * @throws Exception
     */
    public function getProduct(ProductApiRequest $productApiRequest): Operation
    {
        $operation = new Operation();

        $productApiRequest->setHeader(EbayHeaders::createWithAuthentication(env('EBAY_KEY')));

        $productResponse = self::get($productApiRequest);

        if (HttpCodeEnum::HTTP_OK === $productResponse->status()) {
            $responseArray = XmlUtility::xmlToArray($productResponse);

            if (EbayStatusEnum::STATUS_SUCCESS === EbayParser::getStatusFromResult($responseArray)) {
                $items = EbayParser::getProductsFromResult($responseArray);
                $operation->setProducts(ProductCollection::createFromArray($items));

            } else {
                $operation->setError(EbayParser::getErrorMessageFromResult($responseArray));
            }
        } else {
            $operation->setError(self::ERROR_SOMETHING_WENT_WRONG);
        }

        return $operation;
    }
}
