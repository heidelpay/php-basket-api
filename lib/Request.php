<?php

namespace Heidelpay\PhpBasketApi;

use Heidelpay\PhpBasketApi\Adapter\CurlAdapter;
use Heidelpay\PhpBasketApi\Exception\EmptyAuthenticationException;
use Heidelpay\PhpBasketApi\Exception\EmptyBasketException;
use Heidelpay\PhpBasketApi\Object\AbstractObject;
use Heidelpay\PhpBasketApi\Object\Authentication;
use Heidelpay\PhpBasketApi\Object\Basket;

/**
 * heidelpay Basket API Request
 *
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 *
 * @link https://dev.heidelpay.de/php-basket-api
 *
 * @author Jens Richter
 *
 * @package heidelpay\php-basket-api\interaction\object
 */
class Request extends AbstractObject
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
     * @var bool If the request is being sent to the test environment.
     */
    protected $isSandbox = true;

    /**
     * @var null
     */
    protected $adapter;

    /**
     * Request constructor.
     *
     * @param Authentication|null $auth
     * @param Basket|null         $basket
     */
    public function __construct(Authentication $auth = null, Basket $basket = null)
    {
        if ($auth !== null) {
            $this->authentication = $auth;
        }

        if ($basket !== null) {
            $this->basket = $basket;
        }

        $this->adapter = new CurlAdapter();
    }

    /**
     * Enables or disables Sandbox mode.
     *
     * @param bool $isSandbox either if sandbox mode is enabled or not
     *
     * @return $this
     */
    public function setIsSandboxMode($isSandbox)
    {
        $this->isSandbox = $isSandbox;

        return $this;
    }

    /**
     * Sets the authentication object
     *
     * @param string $login
     * @param string $password
     * @param string $senderId
     *
     * @return $this
     */
    public function setAuthentication($login = null, $password = null, $senderId = null)
    {
        $this->authentication = new Authentication($login, $password, $senderId);

        return $this;
    }

    /**
     * Returns the Authentication object.
     *
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
     *
     * @return Basket
     */
    public function getBasket()
    {
        if ($this->basket === null) {
            $this->basket = new Basket();
        }

        return $this->basket;
    }

    /**
     * Retrieves a basket by the given unique basket id.
     * The Response is returned, not the Basket itself.
     *
     * @param string $basketId
     *
     * @return Response
     * @throws EmptyAuthenticationException
     */
    public function retrieveBasket($basketId)
    {
        if ($this->authentication === null) {
            throw new EmptyAuthenticationException();
        }

        return new Response($this->adapter->sendPost($this->generateUrl('get/' . $basketId), $this));
    }

    /**
     * Submits a basket and returns a Response.
     *
     * @return Response
     * @throws EmptyAuthenticationException
     * @throws EmptyBasketException
     */
    public function addNewBasket()
    {
        if ($this->authentication === null) {
            throw new EmptyAuthenticationException();
        }

        if ($this->basket === null) {
            throw new EmptyBasketException();
        }

        return new Response($this->adapter->sendPost($this->generateUrl(), $this));
    }


    /**
     * Submits the current Basket to overwrite/change the basket with the given $basketId,
     * e.g. if the user added a voucher or shipping fees have changed.
     *
     * @param string $basketId
     *
     * @return Response
     * @throws EmptyAuthenticationException
     * @throws EmptyBasketException
     */
    public function overwriteBasket($basketId)
    {
        if ($this->authentication === null) {
            throw new EmptyAuthenticationException();
        }

        if ($this->basket === null) {
            throw new EmptyBasketException();
        }

        return new Response(
            $this->adapter->sendPost($this->generateUrl($basketId), $this)
        );
    }

    /**
     * Generates a url for the request.
     *
     * @param string|null $suffix The url suffix
     *
     * @return string
     */
    private function generateUrl($suffix = null)
    {
        $base = $this->isSandbox ? self::URL_TEST : self::URL_LIVE;

        // add a trailing slash to the base url, if not present
        if (substr($base, -1, 1) !== '/') {
            $base .= '/';
        }

        // remove a leading slash of the suffix, if present
        if ($suffix !== null && substr($suffix, 0, 1) === '/') {
            $suffix = substr($suffix, 1, strlen($suffix) - 1);
        }

        return sprintf('%s%s', $base, $suffix);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'authentication' => $this->authentication,
            'basket' => $this->basket
        ];
    }
}
