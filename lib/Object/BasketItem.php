<?php

namespace Heidelpay\PhpBasketApi\Object;

use Heidelpay\PhpBasketApi\Exception\BasketItemException;

/**
 * Item object for heidelpay api
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
class BasketItem extends AbstractObject
{
    /**
     * @var int The position of the item in the basket (optional)
     */
    protected $position;

    /**
     * @var string The unique basketitem reference id (mandatory)
     */
    protected $basketItemReferenceId;

    /**
     * @var string The unit description of the item e.g. "Stk." (optional)
     */
    protected $unit;

    /**
     * @var int The quantity of the basket item (mandatory)
     */
    protected $quantity;

    /**
     * @var int The discount amount for the basket item (optinal)
     */
    protected $amountDiscount;

    /**
     * @var int The vat value for the basket item in percent (conditional)
     */
    protected $vat;

    /**
     * @var int The gross amount (conditional), means amountNet + amountVat.
     */
    protected $amountGross;

    /**
     * @var int The vat amount, this value could be 0 if the vat value is 0 (conditional)
     */
    protected $amountVat;

    /**
     * @var int The amount per unit (mandatory)
     */
    protected $amountPerUnit;

    /**
     * @var int This value could be the same value as the gross amount if the vat value is 0
     */
    protected $amountNet;

    /**
     * @var string The shop article id for the basket item (optional)
     */
    protected $articleId;

    /**
     * @var string The type of the basket item, e.g. "goods", "shipment", "voucher", "digital" or "physical" (optional)
     */
    protected $type;

    /**
     * @var string The title of the basket item (mandatory)
     */
    protected $title;

    /**
     * @var string A description for the basket item (optional)
     */
    protected $description;

    /**
     * @var string A image url e.g. https://placehold.it/32x32 (optional)
     */
    protected $imageUrl;

    /**
     * @var string
     * @todo yet undocumented in the Integration_Guide (v1.1)!
     */
    protected $channel;

    /**
     * @var string
     * @todo yet undocumented in the Integration_Guide (v1.1)!
     */
    protected $transactionId;

    /**
     * @var string
     * @todo yet undocumented in the Integration_Guide (v1.1)!
     */
    protected $usage;

    /**
     * @var int
     * @todo yet undocumented in the Integration_Guide (v1.1)!
     */
    protected $commissionRate;

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
     * @var string
     * @todo yet undocumented in the Integration_Guide (v1.1)!
     */
    protected $articleCategory;

    /**
     * Attributes that are mandatory for every BasketItem
     *
     * @var array
     */
    protected $mandatory = [
        'basketitemReferenceId',
        'quantity',
        'amountPerUnit',
        'amountNet',
        'title'
    ];

    /**
     * Amount discount setter
     *
     * @param int $value
     *
     * @return $this
     */
    public function setAmountDiscount($value)
    {
        $this->amountDiscount = $value;
        return $this;
    }

    /**
     * Amount gross setter
     *
     * @param int $value
     *
     * @return $this
     */
    public function setAmountGross($value)
    {
        $this->amountGross = $value;
        return $this;
    }

    /**
     * Amount net setter
     *
     * @param int $value
     *
     * @return $this
     */
    public function setAmountNet($value)
    {
        $this->amountNet = $value;
        return $this;
    }

    /**
     * Amount per unit setter
     *
     * @param int $value
     *
     * @return $this
     */
    public function setAmountPerUnit($value)
    {
        $this->amountPerUnit = $value;
        return $this;
    }

    /**
     * Amount vat setter
     *
     * @param int $value
     *
     * @return $this
     */
    public function setAmountVat($value)
    {
        $this->amountVat = $value;
        return $this;
    }

    /**
     * Article id setter
     *
     * @param string $value
     *
     * @return $this
     */
    public function setArticleId($value)
    {
        $this->articleId = $value;
        return $this;
    }

    /**
     * Basket item reference id setter
     *
     * @param string $value
     *
     * @return $this
     */
    public function setBasketItemReferenceId($value)
    {
        $this->basketItemReferenceId = $value;
        return $this;
    }

    /**
     * Description setter
     *
     * @param string $value
     *
     * @return $this
     */
    public function setDescription($value)
    {
        $this->description = $value;
        return $this;
    }

    /**
     * Image url setter
     *
     * If possible provide a https source - http images could be blocked due to
     * browser securtiy restrictions.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setImageUrl($value)
    {
        $this->imageUrl = $value;
        return $this;
    }

    /**
     * Position setter
     *
     * @param int $position
     *
     * @throws BasketItemException
     * @return $this
     */
    public function setPosition($position)
    {
        if ($position <= 0) {
            throw new BasketItemException('BasketItem position cannot be equal or less than 0.');
        }

        $this->position = $position;
        return $this;
    }

    /**
     * Quantity setter
     *
     * @param int $value
     *
     * @return $this
     */
    public function setQuantity($value)
    {
        $this->quantity = $value;
        return $this;
    }

    /**
     * Title setter
     *
     * @param string $value
     *
     * @return $this
     */
    public function setTitle($value)
    {
        $this->title = $value;
        return $this;
    }

    /**
     * Type setter
     *
     * @param string $value
     *
     * @return $this
     */
    public function setType($value)
    {
        $this->type = $value;
        return $this;
    }

    /**
     * Unit setter
     *
     * @param string $value
     *
     * @return $this
     */
    public function setUnit($value)
    {
        $this->unit = $value;
        return $this;
    }

    /**
     * Vat setter
     *
     * @param int $value
     *
     * @return $this
     */
    public function setVat($value)
    {
        $this->vat = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function getReferenceId()
    {
        return $this->basketItemReferenceId;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getAmountDiscount()
    {
        return $this->amountDiscount;
    }

    /**
     * @return int
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @return int
     */
    public function getAmountGross()
    {
        return $this->amountGross;
    }

    /**
     * @return int
     */
    public function getAmountVat()
    {
        return $this->amountVat;
    }

    /**
     * @return int
     */
    public function getAmountPerUnit()
    {
        return $this->amountPerUnit;
    }

    /**
     * @return int
     */
    public function getAmountNet()
    {
        return $this->amountNet;
    }

    /**
     * @return string
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     *
     * @param string $channel
     *
     * @return $this
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     *
     * @param string $transactionId
     *
     * @return $this
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     * @return string
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     *
     * @param string $usage
     *
     * @return $this
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;
        return $this;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     * @return int
     */
    public function getCommissionRate()
    {
        return $this->commissionRate;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     *
     * @param int $commissionRate
     *
     * @return $this
     */
    public function setCommissionRate($commissionRate)
    {
        $this->commissionRate = $commissionRate;
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
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     *
     * @return string
     */
    public function getArticleCategory()
    {
        return $this->articleCategory;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     *
     * @param string $articleCategory
     *
     * @return $this
     */
    public function setArticleCategory($articleCategory)
    {
        $this->articleCategory = $articleCategory;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        // TODO: add channel, transactionId, usage, commisionRate, voucherAmount, voucherId, and articleCategory
        // TODO: if documented and ready to release.
        return [
            'position' => $this->position,
            'basketItemReferenceId' => $this->basketItemReferenceId,
            'articleId' => $this->articleId,
            'title' => $this->title,
            'description' => $this->description,
            'amountGross' => $this->amountGross,
            'amountNet' => $this->amountNet,
            'amountPerUnit' => $this->amountPerUnit,
            'amountVat' => $this->amountVat,
            'amountDiscount' => $this->amountDiscount,
            'unit' => $this->unit,
            'quantity' => $this->quantity,
            'vat' => $this->vat,
            'type' => $this->type,
            'imageUrl' => $this->imageUrl
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
