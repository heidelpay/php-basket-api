<?php

namespace Heidelpay\PhpBasketApi\Object;

/**
 *  Basket object for heidelpay api  
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

class BasketObject {
    /**
     * The total amount of the whole basket without Tax
     * @var float total net amount
     */
    protected $amountTotal = NULL;
    /**
     * The total amount of the whole basket without Tax
     * @var float $amountTotalNet
     */
    protected $amountTotalNet = NULL;
    /**
     * @var float $amountTotalVat
     */
    protected $amountTotalVat = NULL;
    /**
     * The total discount amount of the whole basket
     * @var float $amountTotalDiscount
     */
    protected $amountTotalDiscount = NULL;
    /**
     * A set of basket items
     * @var  $basketItems
     */
    protected $basketItems = NULL;
    /**
     * A basket or shop reference id sent from the shop backend
     * @var string $basketReferenceId
     */
    protected $basketReferenceId = NULL;
    /**
     * The currency code in ISO 4217 format
     * @var string $currencyCode
     */
    protected $currencyCode = NULL;
    /**
     * The total item count of the whole basket
     * @var long $itemCount
     */
    protected $itemCount = NULL;
    /**
     * A note sent from your application
     * @var string $note
     */
    protected $note = NULL;

    /**
     * Amount total getter
     * @return amountTotal
     */
    
    public function getAmountTotal() {
        return $this->amountTotal;
    }
    /**
     * Amount total setter
     * @param float $value
     * @return \Heidelpay\PhpBasketApi\Object\BasketObject
     */
    public function setAmountTotal($value) {
        $this->amountTotal = floatval($value);
        return $this;
    }
    /**
     * Amount total net getter
     * @return number
     */
    public function getAmountTotalNet()
    {
        return $this->amountTotalNet;
    }
    /**
     * Amount totla net setter
     * @param float $value
     * @return \Heidelpay\PhpBasketApi\Object\BasketObject
     */
    public function setAmountTotalNet($value)
    {
        $this->amountTotalNet = floatval($value);
        return $this;
    }
}