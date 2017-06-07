<?php

namespace Heidelpay\PhpBasketApi\Object;

use Heidelpay\PhpBasketApi\Exception\InvalidBasketitemIdException;

/**
 * heidelpay Basket
 * Implementation of the Basket API object
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link https://dev.heidelpay.de/php-basket-api
 * @author Jens Richter
 * @package heidelpay\php-basket-api\object
 */
class Basket extends AbstractObject
{
    /**
     * The total amount of the whole basket without Tax
     * @var int $amountTotalNet
     */
    protected $amountTotalNet;

    /**
     * @var int $amountTotalVat
     */
    protected $amountTotalVat;

    /**
     * The total discount amount of the whole basket
     * @var int $amountTotalDiscount
     */
    protected $amountTotalDiscount;

    /**
     * Array of BasketItems
     * @var BasketItem[]
     */
    protected $basketItems = [];

    /**
     * A basket or shop reference id sent from the shop backend
     * @var string $basketReferenceId
     */
    protected $basketReferenceId;

    /**
     * The currency code in ISO 4217 format
     * @var string $currencyCode
     */
    protected $currencyCode;

    /**
     * A note sent from your application
     * @var string $note
     */
    protected $note;

    /**
     * @var int
     * @todo yet undocumented in the Integration_Guide (v1.1)!
     */
    protected $voucherAmount;

    /**
     * @var string
     * @todo yet undocumented in the Integration_Guide (v1.1)!
     */
    protected $voucherId;

    /**
     * Attributes that are mandatory for the Basket
     * @var array
     */
    protected $mandatory = [
        'amountTotal',
        'currencyCode',
        'basketItems'
    ];

    /**
     * Returns the total discount.
     * @return int
     */
    public function getAmountTotalDiscount()
    {
        return $this->amountTotalDiscount;
    }

    /**
     * @param int $amountTotalDiscount
     *
     * @return $this
     */
    public function setAmountTotalDiscount($amountTotalDiscount)
    {
        $this->amountTotalDiscount = $amountTotalDiscount;

        return $this;
    }

    /**
     * Amount total net getter
     * @return int
     */
    public function getAmountTotalNet()
    {
        return $this->amountTotalNet;
    }

    /**
     * Amount totla net setter
     *
     * @param int $value
     *
     * @return $this
     */
    public function setAmountTotalNet($value)
    {
        $this->amountTotalNet = $value;
        return $this;
    }

    /**
     * Amount total vat getter
     * @return int
     */
    public function getAmountTotalVat()
    {
        return $this->amountTotalVat;
    }

    /**
     * Amount total vat setter
     *
     * @param int $value
     *
     * @return $this
     */
    public function setAmountTotalVat($value)
    {
        $this->amountTotalVat = $value;
        return $this;
    }

    /**
     * return all basket items
     * @return array basketItems
     */
    public function getBasketItems()
    {
        return $this->basketItems;
    }

    /**
     * return the basket item with the given id
     *
     * @param int $itemId
     *
     * @throws InvalidBasketitemIdException
     * @return BasketItem
     */
    public function getBasketItemById($itemId)
    {
        if (array_key_exists($itemId, $this->basketItems)) {
            return $this->basketItems[$itemId];
        }

        throw new InvalidBasketitemIdException("Basket item with id " . $itemId . " does not exist.");
    }

    /**
     * Add item to basket object
     *
     * @param BasketItem $item
     *
     * @return $this
     */
    public function addBasketItem(BasketItem $item)
    {
        $this->basketItems[] = $item;
        return $this;
    }

    /**
     * Updates the object at the given index.
     *
     * @param int $itemId the item index
     * @param BasketItem $item the item to be set
     *
     * @throws InvalidBasketitemIdException
     * @return $this
     */
    public function updateBasketItemById($itemId, BasketItem $item)
    {
        if (array_key_exists($itemId, $this->basketItems)) {
            $this->basketItems[$itemId] = $item;
            return $this;
        }

        throw new InvalidBasketitemIdException('Basket item with id ' . $itemId . ' does not exist.');
    }

    /**
     * Removes an item of the basket at the given position.
     *
     * @param int $itemId the basket index of the item
     *
     * @throws InvalidBasketitemIdException
     * @return $this
     */
    public function deleteBasketItemById($itemId)
    {
        if (array_key_exists($itemId, $this->basketItems)) {
            unset($this->basketItems[$itemId]);
            return $this;
        }

        throw new InvalidBasketitemIdException('Basket item with id ' . $itemId . ' does not exist.');
    }

    /**
     * Basket reference id getter
     * @return string basketReferenceId
     */
    public function getBasketReferenceId()
    {
        return $this->basketReferenceId;
    }

    /**
     * Basket reference id setter
     *
     * @param string $value
     *
     * @return $this
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
     *
     * @param string $value
     *
     * @return $this
     */
    public function setCurrencyCode($value)
    {
        $this->currencyCode = $value;
        return $this;
    }

    /**
     * Item count getter
     * @return int
     */
    public function getItemCount()
    {
        return count($this->basketItems);
    }

    /**
     * Basket note getter
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Basket note setter
     *
     * @param string $value
     *
     * @return $this
     */
    public function setNote($value)
    {
        $this->note = $value;
        return $this;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     * @return int
     */
    public function getVoucherAmount()
    {
        return $this->voucherAmount;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     *
     * @param int $voucherAmount
     */
    public function setVoucherAmount($voucherAmount)
    {
        $this->voucherAmount = $voucherAmount;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     * @return string
     */
    public function getVoucherId()
    {
        return $this->voucherId;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     *
     * @param string $voucherId
     */
    public function setVoucherId($voucherId)
    {
        $this->voucherId = $voucherId;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        // TODO: add voucherAmount and voucherId, if documented and ready to release.
        return [
            'amountTotalNet' => $this->amountTotalNet,
            'amountTotalVat' => $this->amountTotalVat,
            'amountTotalDiscount' => $this->amountTotalDiscount,
            'basketReferenceId' => $this->basketReferenceId,
            'currencyCode' => $this->currencyCode,
            'itemCount' => $this->getItemCount(),
            'note' => $this->note,
            'basketItems' => array_values($this->basketItems)
        ];
    }

    /**
     * Magic setter in favor of parsing.
     *
     * @param $field
     * @param $value
     */
    public function __set($field, $value)
    {
        if (property_exists($this, $field)) {
            $this->$field = $value;
        }
    }
}
