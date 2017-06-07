<?php

namespace Heidelpay\PhpBasketApi;

use Heidelpay\PhpBasketApi\Object\AbstractObject;

/**
 * Representation of the heidelpay Basket API Response
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link https://dev.heidelpay.de/php-basket-api
 * @author Stephano Vogel
 * @package heidelpay\php-basket-api\interaction\object
 */
class Response extends AbstractObject
{
    /**
     * @var string ACK result code
     */
    const RESULT_ACK = 'ACK';

    /**
     * @var string NOK result code
     */
    const RESULT_NOK = 'NOK';

    /**
     * @var string Response result (either "ACK" or "NOK")
     */
    protected $result;

    /**
     * @var string Response message
     */
    protected $message;

    /**
     * @var string The Basket called method
     */
    protected $method;

    /**
     * @var string Basket Id for reference in following transactions
     */
    protected $basketId;

    /**
     * @var string Requested Basket
     */
    protected $basket;

    /**
     * @var BasketError[] array of response errors
     */
    protected $basketErrors;

    /**
     * Response constructor.
     *
     * The response should be in json format (as a string), so it can
     * be parsed correctly.
     *
     * @param string|null $content
     */
    public function __construct($content = null)
    {
        if ($content !== null && is_string($content)) {
            /** @var array $response */
            $response = json_decode($content);
            error_log($response);
        }
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param string $result
     *
     * @return $this
     */
    public function setResult($result)
    {
        $this->result = $result;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getBasketId()
    {
        return $this->basketId;
    }

    /**
     * @param string $basketId
     *
     * @return $this
     */
    public function setBasketId($basketId)
    {
        $this->basketId = $basketId;
        return $this;
    }

    /**
     * @return string
     */
    public function getBasket()
    {
        return $this->basket;
    }

    /**
     * @param string $basket
     *
     * @return $this
     */
    public function setBasket($basket)
    {
        $this->basket = $basket;
        return $this;
    }

    /**
     * @return BasketError[]
     */
    public function getBasketErrors()
    {
        return $this->basketErrors;
    }

    /**
     * @param BasketError $basketError
     *
     * @return $this
     */
    public function addBasketError(BasketError $basketError)
    {
        $this->basketErrors[] = $basketError;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'result' => $this->result,
            'method' => $this->method,
            'basketId' => $this->basketId,
            'basketErrors' => array_values($this->basketErrors)
        ];
    }
}
