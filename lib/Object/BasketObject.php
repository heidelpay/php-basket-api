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
    protected $basketItems = array();
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
     * @return float amountTotalNet
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
    /**
     * Amount total vat getter
     * @return number
     */
    public function getAmountTotalVat()
    {
    	return $this->amountTotalVat;
    }
    /**
     * Amount total vat setter
     * @param float $value
     * @return \Heidelpay\PhpBasketApi\Object\BasketObject
     */
    public function setAmountTotalVat($value)
    {
    	$this->amountTotalVat = floatval($value);
    	return $this;
    }
    /**
     * return all basket items
     * @return array basketItems
     */
    public function getAllBasketItems()
    {
    		return $this->basketItems;
    }
    /**
     * return the basket item with the given id 
     * @param int $ItemId
     * @throws \Exception
     * @return \Heidelpay\PhpBasketApi\Object\Item
     */
    public function getBasketItemById($ItemId)
    {
    	if (array_key_exists($ItemId, $this->basketItems)){
    		return $this->basketItems[$ItemId];
    	}
    	
    	throw new \Exception("Basket item with id ".(int)$ItemId." does not exist.");
    }
    /**
     * Add item to basket object
     * @param \Heidelpay\PhpBasketApi\Object\Item $item
     * @return \Heidelpay\PhpBasketApi\Object\BasketObject
     */ 
    public function addBasketItem(\Heidelpay\PhpBasketApi\Object\Item $item)
    {
    	$this->basketItems[] = $item;
    	return $this;
    }
    /**
     * Add item to basket object
     * @param \Heidelpay\PhpBasketApi\Object\Item $item
     * @return \Heidelpay\PhpBasketApi\Object\BasketObject
     */
    public function updateBasketItemById($ItemId, \Heidelpay\PhpBasketApi\Object\Item $item)
    {
    	if (array_key_exists($ItemId, $this->basketItems)){
    		$this->basketItems[$ItemId] = $item;
    		return $this;
    	}
    	
    	throw new \Exception('Bastekt item with id '.(int)$ItemId.' does not exist.');
    }
    
    public function deletBsketItemById($ItemId)
    {
    	if (array_key_exists($ItemId, $this->basketItems)) {
    		$this->basketItems[$ItemId] = NULL;
    		return $this;
    	}
    	
    	throw new \Exception('No item to delet');
    }
    /**
     * Basket reference id getter
     * @return string basketReferenceId
     */
    public function getBasketReferenceId() {
    	return $this->basketReferenceId ;
    }
    /**
     * Basket reference id setter
     * @param string $value
     * @return \Heidelpay\PhpBasketApi\Object\BasketObject
     */
    public function setBasketReferenceId($value)
    {
   		$this->basketReferenceId = $value;
   		return $this;
    }
    /**
     * Currency code getter 
     * @return string currency code
     */
    public function getCurrencyCode() 
    {
    	return $this->currencyCode;
    }
    /**
     * Currency code setter
     * @return \Heidelpay\PhpBasketApi\Object\BasketObject
     */
    public function setCurrencyCode($value)
    {
    	$this->currencyCode = $value;
    	return $this;
    }
    /**
     * Item count getter
     * @return long item count
     */
    public function getItemCount()
    {
    	return $this->itemCount;
    }
    /**
     * Item count setter
     * @param int $value
     */
    public function setItemCount($value)
    {
    	$this->itemCount = (int)$value;
    	return $this;
    }
    /**
     * set item counter +1
     * @return \Heidelpay\PhpBasketApi\Object\BasketObject
     */
    public function itemCountPlusOne()
    {
    	$this->itemCount++;
    	return $this;
    }
    /**
     * Basket note getter
     * @return string note
     */
    public function getNote()
    {
    	return $this->note;
    }
    /**
     * Basket note setter
     * @return string note
     */
    public function setNote($value)
    {
    	$this->note = $value;
    	return $note;
    }
}