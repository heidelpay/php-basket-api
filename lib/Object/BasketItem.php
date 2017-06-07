<?php

namespace Heidelpay\PhpBasketApi\Object;

/**
 *  Item object for heidelpay api
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link  https://dev.heidelpay.de/php-basket-api
 * @author Jens Richter
 * @package heidelpay\php-basket-api\object
 */
class BasketItem extends AbstractObject
{
    /**
     * The position of the item in the basket (optional)
     * @var int $position
     */
    protected $position;

    /**
     * The unique basketitem reference id (mandatory)
     * @var string $basketitemReferenceId
     */
    protected $basketitemReferenceId;

    /**
     * The unit description of the item e.g. "Stk." (optional)
     * @var string $unit
     */
    protected $unit;

    /**
     * The quantity of the basket item (mandatory)
     * @var int $quantity
     */
    protected $quantity;

    /**
     * The discount amount for the basket item (optinal)
     * @var int $amountDiscount
     */
    protected $amountDiscount;

    /**
     * The vat value for the basket item in percent (conditional)
     * @var int $vat
     */
    protected $vat;

    /**
     * The gross amount (conditional)
     * amountNet + amountVat. This value could be the same value as the net amount if the vat value is 0
     * @var int $amountGross
     */
    protected $amountGross;

    /**
     * The vat amount, this value could be 0 if the vat value is 0 (conditional)
     * @var int $amountVat
     */
    protected $amountVat;

    /**
     * The amount per unit (mandatory)
     * @var int $amountPerUnit
     */
    protected $amountPerUnit;

    /**
     * The net amount (mandatory)
     * This value could be the same value as the gross amount if the vat value is 0
     * @var int $amountNet
     */
    protected $amountNet;

    /**
     * The shop article id for the basket item (optional)
     * @var string $articleId
     */
    protected $articleId;

    /**
     * The type of the basket item, e.g. "goods", "shipment", "voucher", "digital" or "physical" (optional)
     * @var string $type
     */
    protected $type;

    /**
     * The title of the basket item (mandatory)
     * @var string $title
     */
    protected $title;

    /**
     * A description for the basket item (optional)
     * @var string $description
     */
    protected $description;

    /**
     * A image url e.g. https://placehold.it/32x32 (optional)
     * @var string $imageUrl
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
     */
    public function setAmountPerUnit($value)
    {
        $this->amountPerUnit = $value;
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
        $this->basketitemReferenceId = $value;
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
     * @param int $value
     *
     * @return $this
     */
    public function setPosition($value)
    {
        $this->position = $value;
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
    public function getBasketitemReferenceId()
    {
        return $this->basketitemReferenceId;
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
     * @param string $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
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
     * @param string $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
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
     * @param string $usage
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;
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
     * @param int $commissionRate
     */
    public function setCommissionRate($commissionRate)
    {
        $this->commissionRate = $commissionRate;
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
     * @param string $voucherId
     */
    public function setVoucherId($voucherId)
    {
        $this->voucherId = $voucherId;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     * @return string
     */
    public function getArticleCategory()
    {
        return $this->articleCategory;
    }

    /**
     * @todo property is yet undocumented in the Integration_Guide (v1.1)!
     * @param string $articleCategory
     */
    public function setArticleCategory($articleCategory)
    {
        $this->articleCategory = $articleCategory;
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
            'basketItemReferenceId' => $this->basketitemReferenceId,
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
