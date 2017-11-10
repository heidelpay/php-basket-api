<?php

namespace Heidelpay\PhpBasketApi\Object;

use Heidelpay\PhpBasketApi\Exception\InvalidBasketitemIdException;
use Heidelpay\PhpBasketApi\Exception\InvalidBasketitemPositionException;

/**
 * heidelpay Basket
 * Implementation of the Basket API object
 *
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 *
 * @link https://dev.heidelpay.de/php-basket-api
 *
 * @author Jens Richter
 *
 * @package heidelpay\php-basket-api\object
 */
class Basket extends AbstractObject
{
    /**
     * The total amount of the whole basket without Tax
     *
     * @var int $amountTotalNet
     */
    protected $amountTotalNet;

    /**
     * @var int $amountTotalVat
     */
    protected $amountTotalVat;

    /**
     * The total discount amount of the whole basket
     *
     * @var int $amountTotalDiscount
     */
    protected $amountTotalDiscount;

    /**
     * Array of BasketItems
     *
     * @var BasketItem[]
     */
    protected $basketItems = [];

    /**
     * A basket or shop reference id sent from the shop backend
     *
     * @var string $basketReferenceId
     */
    protected $basketReferenceId;

    /**
     * The currency code in ISO 4217 format
     *
     * @var string $currencyCode
     */
    protected $currencyCode;

    /**
     * A note sent from your application
     *
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
     *
     * @var array
     */
    protected $mandatory = [
        'amountTotal',
        'currencyCode',
        'basketItems'
    ];

    /**
     * Returns the total discount.
     *
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
     *
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
     *
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
     * Basket reference id getter
     *
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
     *
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
     *
     * @return int
     */
    public function getItemCount()
    {
        return count($this->basketItems);
    }

    /**
     * Basket note getter
     *
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
     *
     * @return $this
     */
    public function setVoucherAmount($voucherAmount)
    {
        $this->voucherAmount = $voucherAmount;
        return $this;
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
     *
     * @return $this
     */
    public function setVoucherId($voucherId)
    {
        $this->voucherId = $voucherId;
        return $this;
    }

    /**
     * Returns all BasketItems
     *
     * @return BasketItem[]
     */
    public function getBasketItems()
    {
        return $this->basketItems;
    }

    /**
     * Returns the basket item with the given position
     *
     * @param int $position
     *
     * @throws InvalidBasketitemPositionException
     * @return BasketItem|null
     */
    public function getBasketItemByPosition($position)
    {
        if ($position <= 0) {
            throw new InvalidBasketitemPositionException('BasketItem position cannot be equal or less than 0.');
        }

        if (array_key_exists($position - 1, $this->basketItems)) {
            return $this->basketItems[$position - 1];
        }

        return null;
    }

    /**
     * Returns a BasketItem by it's reference id.
     *
     * @param string $referenceId
     *
     * @return BasketItem|null
     */
    public function getBasketItemByReferenceId($referenceId)
    {
        foreach ($this->getBasketItems() as $basketItem) {
            if ($basketItem->getReferenceId() === $referenceId) {
                return $basketItem;
            }
        }

        return null;
    }

    /**
     * @param $position
     *
     * @throws InvalidBasketitemPositionException
     * @return BasketItem
     */
    private function getBasketItemByRealPosition($position)
    {
        if (isset($this->basketItems[$position])) {
            return $this->basketItems[$position];
        }

        throw new InvalidBasketitemPositionException('BasketItem position ' . $position . ' is invalid.');
    }

    /**
     * Add item to basket object
     *
     * @param BasketItem $item The BasketItem to be added
     * @param int|null   $position The position where the item should be placed (optional)
     * @param bool       $autoIncrease If the BasketItem amounts can be added to the Basket automatically
     *
     * @throws InvalidBasketitemPositionException
     * @return $this
     */
    public function addBasketItem(BasketItem $item, $position = null, $autoIncrease = true)
    {
        $realPosition = $this->getBasketItemPosition($item, $position);

        if ($realPosition === null) {
            $item->setPosition($this->getItemCount() + 1);

            if ($autoIncrease) {
                $this->addBasketItemAmountsToBasket($item);
            }

            $this->basketItems[] = $item;
            return $this;
        }

        $this->basketItems[$realPosition] = $item;
        sort($this->basketItems);

        return $this;
    }

    /**
     * Updates the object at the given index.
     *
     * @param BasketItem $item the item to be set
     * @param int        $position The position of the BasketItem
     * @param bool       $autoUpdate If Basket amounts should be updated automatically
     *
     * @throws InvalidBasketitemPositionException
     * @return $this
     */
    public function updateBasketItem(BasketItem $item, $position = 0, $autoUpdate = true)
    {
        $realPosition = $this->getBasketItemPosition($item, $position);

        if ($realPosition === null) {
            throw new InvalidBasketitemPositionException('Invalid BasketItem position: ' . $position);
        }

        if (array_key_exists($realPosition, $this->basketItems)) {
            if ($autoUpdate) {
                $oldItem = $this->getBasketItemByRealPosition($realPosition);
                $this->updateAmountBalances($oldItem, $item);
            }

            $this->basketItems[$realPosition] = $item;
            return $this;
        }

        throw new InvalidBasketitemPositionException('Basket item with id ' . $position . ' does not exist.');
    }

    /**
     * Removes an item of the basket at the given position.
     *
     * @param int $position the basket index of the item
     * @param bool $autoDecrease decrease Basket amounts by BasketItem amounts
     *
     * @throws InvalidBasketitemPositionException
     * @return $this
     */
    public function deleteBasketItemByPosition($position, $autoDecrease = true)
    {
        if ($position <= 0) {
            throw new InvalidBasketitemPositionException('BasketItem position cannot be equal or less than 0.');
        }

        if (array_key_exists($position - 1, $this->basketItems)) {
            if ($autoDecrease) {
                $this->decreaseBasketItemAmountsFromBasket($this->getBasketItemByPosition($position));
            }

            unset($this->basketItems[$position - 1]);
            return $this;
        }

        throw new InvalidBasketitemPositionException('Basket item on position ' . $position . ' does not exist.');
    }

    /**
     * Deletes a BasketItem by it's reference id.
     *
     * @param string $referenceId
     * @param bool $autoDecrease decrease Basket amounts by BasketItem amounts
     *
     * @return $this
     *
     * @throws InvalidBasketitemIdException
     */
    public function deleteBasketItemByReferenceId($referenceId, $autoDecrease = true)
    {
        foreach ($this->getBasketItems() as $basketItem) {
            if ($basketItem->getReferenceId() === $referenceId) {
                if ($autoDecrease) {
                    $this->decreaseBasketItemAmountsFromBasket($basketItem);
                }

                unset($this->basketItems[$basketItem->getPosition() - 1]);
                return $this;
            }
        }

        throw new InvalidBasketitemIdException('Basket item with refereceId ' . $referenceId . ' does not exist.');
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
     * Determines the position of the BasketItem in the BasketItem array.
     *
     * @param BasketItem $item
     * @param int|null   $position
     *
     * @return int|null
     */
    private function getBasketItemPosition(BasketItem $item, $position = null)
    {
        $result = null;

        // in case the item position is not null and > 0
        if (is_numeric($item->getPosition()) && $item->getPosition() > 0) {
            $result = $item->getPosition();
        }

        // in case the position is not null and > 0
        if (is_numeric($position) && $position > 0) {
            $result = $position - 1;
        }

        // if an item already exists on the determined position, just increase the result number...
        if ($result !== null && isset($this->basketItems[$result])) {
            ++$result;
        }

        return $result;
    }

    /**
     * Increases the total discount amount.
     *
     * @param int $amount
     */
    public function addAmountTotalDiscount($amount)
    {
        $this->amountTotalDiscount += $amount;
    }

    /**
     * Decreases the total discount amount.
     *
     * @param int $amount
     */
    public function decreaseAmountTotalDiscount($amount)
    {
        $this->amountTotalDiscount -= $amount;
    }

    /**
     * Increases the total net amount.
     *
     * @param int $amount
     */
    public function addAmountTotalNet($amount)
    {
        $this->amountTotalNet += $amount;
    }

    /**
     * Decreases the total net amount.
     *
     * @param int $amount
     */
    public function decreaseAmountTotalNet($amount)
    {
        $this->amountTotalNet -= $amount;
    }

    /**
     * Increases the total vat amount.
     *
     * @param int $amount
     */
    public function addAmountTotalVat($amount)
    {
        $this->amountTotalVat += $amount;
    }

    /**
     * Decreases the total vat amount.
     *
     * @param int $amount
     */
    public function decreaseAmountTotalVat($amount)
    {
        $this->amountTotalVat -= $amount;
    }

    /**
     * Increases the Basket amounts by the BasketItem amounts.
     *
     * @param BasketItem $basketItem
     */
    private function addBasketItemAmountsToBasket(BasketItem $basketItem)
    {
        $this->addAmountTotalDiscount($basketItem->getAmountDiscount());
        $this->addAmountTotalNet($basketItem->getAmountNet());
        $this->addAmountTotalVat($basketItem->getAmountVat());
    }

    /**
     * Decreases the Basket amounts by the BasketItem amounts.
     *
     * @param BasketItem $basketItem
     */
    private function decreaseBasketItemAmountsFromBasket(BasketItem $basketItem)
    {
        $this->decreaseAmountTotalDiscount($basketItem->getAmountDiscount());
        $this->decreaseAmountTotalNet($basketItem->getAmountNet());
        $this->decreaseAmountTotalVat($basketItem->getAmountVat());
    }

    /**
     * Updates the Basket balances according to the differences
     * of an updated BasketItem and it's predecessor
     *
     * @param BasketItem $oldItem
     * @param BasketItem $newItem
     */
    private function updateAmountBalances(BasketItem $oldItem, BasketItem $newItem)
    {
        $discountBalance = $newItem->getAmountDiscount() - $oldItem->getAmountDiscount();
        if ($discountBalance !== 0) {
            $this->updateDiscountAmountBalance($discountBalance);
        }

        $netBalance = $newItem->getAmountDiscount() - $oldItem->getAmountNet();
        if ($netBalance !== 0) {
            $this->updateNetAmountBalance($netBalance);
        }

        $vatBalance = $newItem->getAmountVat() - $oldItem->getAmountVat();
        if ($vatBalance !== 0) {
            $this->updateVatAmountBalance($vatBalance);
        }
    }

    /**
     * Updates the Basket discount amount depending on the given amount.
     *
     * @param int $amount
     */
    private function updateDiscountAmountBalance($amount)
    {
        if ($amount > 0) {
            $this->addAmountTotalDiscount($amount);
            return;
        }

        $this->decreaseAmountTotalDiscount($amount);
    }

    /**
     * Updates the Basket net amount depending on the given amount.
     *
     * @param int $amount
     */
    private function updateNetAmountBalance($amount)
    {
        if ($amount > 0) {
            $this->addAmountTotalNet($amount);
            return;
        }

        $this->decreaseAmountTotalNet($amount);
    }

    /**
     * Updates the Basket vat amount depending on the given amount.
     *
     * @param int $amount
     */
    private function updateVatAmountBalance($amount)
    {
        if ($amount > 0) {
            $this->addAmountTotalVat($amount);
            return;
        }

        $this->decreaseAmountTotalVat($amount);
    }

    /**
     * Magic getter for properties.
     *
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return null;
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

    /**
     * Isset implementation for the __set method
     *
     * @param $field
     * @return bool
     */
    public function __isset($field)
    {
        if (!property_exists($this, $field)) {
            return false;
        }

        return true;
    }
}
