<?php

namespace Heidelpay\PhpBasketApi\Object;

use JsonSerializable;

/**
 * heidelpay Basket
 * Implementation of the Basket API object
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link https://dev.heidelpay.de/php-basket-api
 * @author Jens Richter
 * @package heidelpay\php-basket-api\object
 */
class Basket implements JsonSerializable
{
    /**
     * The total amount of the whole basket without Tax
     * @var float total net amount
     */
    protected $amountTotal = null;

    /**
     * The total amount of the whole basket without Tax
     * @var float $amountTotalNet
     */
    protected $amountTotalNet = null;

    /**
     * @var float $amountTotalVat
     */
    protected $amountTotalVat = null;

    /**
     * The total discount amount of the whole basket
     * @var float $amountTotalDiscount
     */
    protected $amountTotalDiscount = null;

    /**
     * Array of BasketItems
     * @var BasketItem[]
     */
    protected $basketItems = [];

    /**
     * A basket or shop reference id sent from the shop backend
     * @var string $basketReferenceId
     */
    protected $basketReferenceId = null;

    /**
     * The currency code in ISO 4217 format
     * @var string $currencyCode
     */
    protected $currencyCode = null;

    /**
     * The total item count of the whole basket
     * @var int $itemCount
     */
    protected $itemCount = 0;

    /**
     * A note sent from your application
     * @var string $note
     */
    protected $note = null;

    /**
     * Amount total getter
     * @return float
     */
    public function getAmountTotal()
    {
        return $this->amountTotal;
    }

    /**
     * Amount total setter
     *
     * @param float $value
     *
     * @return $this
     */
    public function setAmountTotal($value)
    {
        $this->amountTotal = floatval($value);
        return $this;
    }

    /**
     * Amount total net getter
     * @return float
     */
    public function getAmountTotalNet()
    {
        return $this->amountTotalNet;
    }

    /**
     * Amount totla net setter
     *
     * @param float $value
     *
     * @return $this
     */
    public function setAmountTotalNet($value)
    {
        $this->amountTotalNet = floatval($value);
        return $this;
    }

    /**
     * Amount total vat getter
     * @return float
     */
    public function getAmountTotalVat()
    {
        return $this->amountTotalVat;
    }

    /**
     * Amount total vat setter
     *
     * @param $value
     *
     * @return $this
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
     *
     * @param int $itemId
     *
     * @throws \Exception
     * @return BasketItem
     */
    public function getBasketItemById($itemId)
    {
        if (array_key_exists($itemId, $this->basketItems)) {
            return $this->basketItems[$itemId];
        }

        throw new \Exception("Basket item with id " . $itemId . " does not exist.");
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
        $this->increaseItemCount();
        return $this;
    }

    /**
     * Updates the object at the given index.
     *
     * @param int $itemId the item index
     * @param BasketItem $item the item to be set
     *
     * @throws \Exception
     * @return $this
     */
    public function updateBasketItemById($itemId, BasketItem $item)
    {
        if (array_key_exists($itemId, $this->basketItems)) {
            $this->basketItems[$itemId] = $item;
            return $this;
        }

        throw new \Exception('Bastekt item with id ' . $itemId . ' does not exist.');
    }

    /**
     * Removes an item of the basket at the given position.
     *
     * @param int $itemId the basket index of the item
     *
     * @throws \Exception
     * @return $this
     */
    public function deletBasketItemById($itemId)
    {
        if (array_key_exists($itemId, $this->basketItems)) {
            unset($this->basketItems[$itemId]);
            $this->setItemCount($this->getItemCount() - 1);
            return $this;
        }

        throw new \Exception('No item to delete');
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
        return $this->itemCount;
    }

    /**
     * Item count setter
     *
     * @param int $value
     *
     * @return $this
     */
    public function setItemCount($value)
    {
        $this->itemCount = (int)$value;
        return $this;
    }

    /**
     * Increases the Basket item count by one.
     * @return $this
     */
    public function increaseItemCount()
    {
        $this->itemCount++;
        return $this;
    }

    /**
     * Decreases the Basket item count by one.
     * @return $this
     */
    public function decreaseItemCount()
    {
        $this->itemCount--;
        return $this;
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
     * Returns the Json representation of the Basket object.
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->jsonSerialize());
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'amountTotalNet' => $this->amountTotalNet,
            'amountTotalVat' => $this->amountTotalVat,
            'amountTotalDiscount' => $this->amountTotalDiscount,
            'basketReferenceId' => $this->basketReferenceId,
            'currencyCode' => $this->currencyCode,
            'itemCount' => $this->itemCount,
            'note' => $this->note,
            'basketItems' => array_values($this->basketItems)
        ];
    }
}
