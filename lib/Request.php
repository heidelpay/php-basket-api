<?php

namespace Heidelpay\PhpBasketApi;

use Heidelpay\PhpBasketApi\Object\Authentication;
use Heidelpay\PhpBasketApi\Object\Basket;

/**
 * heidelpay Basket API Request
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link https://dev.heidelpay.de/php-basket-api
 * @author Jens Richter
 * @package heidelpay\php-basket-api\interaction\object
 */
class Request
{
    /**
     * @var string URL for the test system
     */
    const URL_TEST = 'https://test-heidelpay.hpcgw.net/ngw/basket/';

    /**
     * @var string URL for the live system
     */
    const URL_LIVE = 'https://heidelpay.hpcgw.net/ngw/basket/';

    /**
     * @var Authentication The authentication object
     */
    protected $authentication = null;

    /**
     * @var Basket The basket object
     */
    protected $basket = null;

    /**
     * Sets the authentication object
     * @return $this
     */
    public function setAuthentication($login, $password, $senderId)
    {
        $this->authentication = new Authentication();

        return $this;
    }

    /**
     * Returns the Authentication object.
     * @return Authentication
     */
    public function getAuthentication()
    {
        if ($this->authentication === null) {
            $this->authentication = new Authentication();
        }

        return $this->authentication;
    }

    /**
     * Sets the basket for the request.
     *
     * @param Basket $basket
     *
     * @return $this
     */
    public function setBasket(Basket $basket)
    {
        $this->basket = $basket;

        return $this;
    }

    /**
     * Returns the Basket from the Request.
     * @return Basket
     */
    public function getBasket()
    {
        if ($this->basket === null) {
            $this->basket = new Basket();
        }

        return $this->basket;
    }
}
