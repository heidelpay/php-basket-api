<?php

namespace Heidelpay\PhpBasketApi\Object;

use JsonSerializable;

/**
 *  Item object for heidelpay api
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link  https://dev.heidelpay.de/php-basket-api
 * @author Jens Richter
 * @package heidelpay\php-basket-api\object
 */
class BasketItem implements JsonSerializable
{
    /**
     * The position of the item in the basket (optional)
     * @var int $position
     */
    public $position = null;

    /**
     * The unique basketitem reference id (mandatory)
     * @var string $basketitemReferenceId
     */
    public $basketitemReferenceId = null;

    /**
     * The unit description of the item e.g. "Stk." (optional)
     * @var string $unit
     */
    public $unit = null;

    /**
     * The quantity of the basket item (mandatory)
     * @var int $quantity
     */
    public $quantity = null;

    /**
     * The discount amount for the basket item (optinal)
     * @var int $amountDiscount
     */
    public $amountDiscount = null;

    /**
     * The vat value for the basket item in percent (conditional)
     * @var int $vat
     */
    public $vat = null;

    /**
     * The gross amount (conditional)
     * amountNet + amountVat. This value could be the same value as the net amount if the vat value is 0
     * @var int $amountGross
     */
    public $amountGross = null;

    /**
     * The vat amount, this value could be 0 if the vat value is 0 (conditional)
     * @var int $amountVat
     */
    public $amountVat = null;

    /**
     * The amount per unit (mandatory)
     * @var int $amountPerUnit
     */
    public $amountPerUnit = null;

    /**
     * The net amount (mandatory)
     * This value could be the same value as the gross amount if the vat value is 0
     * @var int $amountNet
     */
    public $amountNet = null;

    /**
     * The shop article id for the basket item (optional)
     * @var string $articleId
     */
    public $articleId = null;

    /**
     * The type of the basket item, e.g. "goods", "shipment", "voucher", "digital" or "physical" (optional)
     * @var string $type
     */
    public $type = null;

    /**
     * The title of the basket item (mandatory)
     * @var string $title
     */
    public $title = null;

    /**
     * A description for the basket item (optional)
     * @var string $description
     */
    public $description = null;

    /**
     * A image url e.g. https://placehold.it/32x32 (optional)
     * @var string $imageUrl
     */
    public $imageUrl = null;

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
        $this->amountNet = $value;
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
     * Returns the Json representation of the BasketItem object.
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
}
