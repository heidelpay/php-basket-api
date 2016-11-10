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
     * authentication parameter
     * @var \Heidelpay\PhpBasketApi\Object\Authentication
     */
    protected $authentication = NULL;
    
    protected $basket = NULL;
    
}