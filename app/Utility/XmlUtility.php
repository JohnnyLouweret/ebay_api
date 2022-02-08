<?php

namespace App\Utility;

use SimpleXMLElement;

class XmlUtility
{
    /**
     * @param string $xml
     *
     * @return array
     */
    public static function xmlToArray(string $xml): array
    {
        $xmlElement = self::xmlToSimpleXmlElement($xml);

        return self::simpleXmlElementToArray($xmlElement);
    }

    /**
     * @param string $xml
     *
     * @return SimpleXMLElement
     */
    public static function xmlToSimpleXmlElement(string $xml): SimpleXMLElement
    {
        return simplexml_load_string($xml,null,LIBXML_NOCDATA );
    }

    /**
     * @param SimpleXMLElement $xml
     *
     * @return array
     */
    public static function simpleXmlElementToArray(SimpleXMLElement $xml): array
    {
        $json = json_encode($xml);

        return StringUtility::jsonToArray($json);
    }
}
