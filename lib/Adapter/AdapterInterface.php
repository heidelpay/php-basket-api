<?php

namespace Heidelpay\PhpBasketApi\Adapter;

use Exception;
use Heidelpay\PhpBasketApi\Exception\CurlAdapterException;
use Heidelpay\PhpBasketApi\Request;

/**
 * Interface for connection adapters
 *
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 *
 * @link https://dev.heidelpay.de/php-basket-api
 *
 * @author Stephano Vogel
 *
 * @package heidelpay\php-basket-api\interfaces\adapter
 */
interface AdapterInterface
{
    /**
     * Sends a post request to the $url containing the $payload Request
     *
     * @param string  $url
     * @param Request $payload
     *
     * @throws Exception
     * @throws CurlAdapterException
     *
     * @return string The BasketApi JSON response
     */
    public function sendPost($url, Request $payload);
}