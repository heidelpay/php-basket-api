<?php

namespace Heidelpay\PhpBasketApi;

use Heidelpay\PhpBasketApi\Object\AbstractObject;

/**
 * Respresentation of the heidelpay Basket API Error
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link https://dev.heidelpay.de/php-basket-api
 * @author Stephano Vogel
 * @package heidelpay\php-basket-api\interaction\object
 */
class BasketError extends AbstractObject
{
    /**
     * @var string error code
     */
    protected $code;

    /**
     * @var string error message
     */
    protected $message;

    /**
     * Returns the Errorcode
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets the error code.
     *
     * @param $code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Sets the error code.
     *
     * @param $message
     *
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'code' => $this->code,
            'message' => $this->message
        ];
    }
}
