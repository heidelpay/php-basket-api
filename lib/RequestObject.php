<?php

namespace Heidelpay\PhpBasketApi;

/**
 *  Request object for heidelpay api  
 *
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link  https://dev.heidelpay.de/php-basket-api
 * @author  Jens Richter
 * 
 * @package  Heidelpay
 * @subpackage php-basket-api
 * @category php-basket-api
 */

class RequestObject {
    /**
     * authentication object
     * @var \Heidelpay\PhpBasketApi\Object\AuthenticationObject
     */
    protected $authentication = NULL;
    /**
     * basket object
     * @var \Heidelpay\PhpBasketApi\Object\BasketObject
     */
    protected $basket = NULL;
 	/**
 	 * set authentication object
 	 * @return \Heidelpay\PhpBasketApi\RequestObject
 	 */   
    public function setAuthentication()
    {
    	$this->authentication = new \Heidelpay\PhpBasketApi\Object\AuthenticationObject();
    	return $this;
    }
    /**
     * authentification getter
     * @return \Heidelpay\PhpBasketApi\Object\AuthenticationObject
     */
    public function getAuthentication(){
    	if($this->authentication === NULL) {
    		return new \Heidelpay\PhpBasketApi\Object\AuthenticationObject();
    	}
    	return $this->authentication;
    }
}