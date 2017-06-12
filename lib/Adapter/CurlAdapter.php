<?php

namespace Heidelpay\PhpBasketApi\Adapter;

use Heidelpay\PhpBasketApi\Request;
use Heidelpay\PhpBasketApi\Response;

/**
 * Standard curl adapter
 * You can use this adapter for your project or you can
 * create one based on a standard library like zend-http
 * or guzzlehttp.
 * @license Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link https://dev.heidelpay.de/PhpApi
 * @author Jens Richter
 * @package heidelpay
 */
class CurlAdapter
{
    /**
     * send post request to payment server
     *
     * @param string $uri url of the target system
     * @param Request $payload The Basket Api request object
     *
     * @throws \Exception
     * @return mixed
     */
    public function sendPost($uri, Request $payload)
    {
        if (!extension_loaded('curl')) {
            throw new \Exception('The php-curl library is not installed.');
        }

        $curlRequest = curl_init();
        curl_setopt($curlRequest, CURLOPT_URL, $uri);
        curl_setopt($curlRequest, CURLOPT_HEADER, 0);
        curl_setopt($curlRequest, CURLOPT_FAILONERROR, true);
        curl_setopt($curlRequest, CURLOPT_TIMEOUT, 60);
        curl_setopt($curlRequest, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($curlRequest, CURLOPT_POST, true);
        curl_setopt($curlRequest, CURLOPT_POSTFIELDS, $payload->toJson());
        curl_setopt($curlRequest, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload->toJson())
        ]);

        curl_setopt($curlRequest, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlRequest, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curlRequest, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlRequest, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($curlRequest, CURLOPT_USERAGENT, "PhpBasketApi");

        $response = curl_exec($curlRequest);
        $error = curl_error($curlRequest);
        $info = curl_getinfo($curlRequest, CURLINFO_HTTP_CODE);

        curl_close($curlRequest);

        return $response;
    }
}
