<?php

namespace Heidelpay\PhpBasketApi\Object;

/**
 *  Item object for heidelpay api  
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

class ItemObject {
	/**
	 * The position of the item in the basket (optional)
	 * @var long $position
	 */
	public $position = NULL;
	/**
	 * The unique basketitem reference id (mandatory)
	 * @var string(255) $basketitemReferenceId
	 */
	public $basketitemReferenceId = NULL;
	/**
	 * The unit description of the item e.g. "Stk." (optional)
	 * @var string(255) $unit
	 */
	public $unit = NULL;
	/**
	 * The quantity of the basket item (mandatory)
	 * @var long $quantity
	 */
	public $quantity = NULL;
	/**
	 * The discount amount for the basket item (optinal)
	 * @var long $amountDiscount
	 */
	public $amountDiscount = NULL;
	/**
	 * The vat value for the basket item in percent (conditional)
	 * @var long $vat
	 */
	public $vat = NULL;
	/**
	 * The gross amount (conditional)
	 * 
	 * amountNet + amountVat. This value could be the same value as the net amount if the vat value is 0 
	 * @var long $amountGross
	 */
	public $amountGross = NULL;
	/**
	 * The vat amount, this value could be 0 if the vat value is 0 (conditional)
	 * @var long $amountVat
	 */
	public $amountVat = NULL;
	/**
	 * The amount per unit (mandatory)
	 * @var long $amountPerUnit
	 */
	public $amountPerUnit = NULL;
	/**
	 * The net amount (mandatory)
	 * 
	 * This value could be the same value as the gross amount if the vat value is 0
	 * @var long $amountNet
	 */
	public $amountNet = NULL;
	/**
	 * The shop article id for the basket item (optional)
	 * @var string(255) $articleId
	 */
	public $articleId = NULL;
	/**
	 * The type of the basket item (optional)
	 * 
	 * e. g. "goods", "shipment", "voucher", "digital" or "physical"
	 * @var string(255) $type
	 */
	public $type = NULL;
	/**
	 * The title of the basket item (mandatory)
	 * @var string(255) $title
	 */
	public $title = NULL;
	/**
	 * A description for the basket item (optional)
	 * @var string(255) $description
	 */
	public $description = NULL;
	/**
	 * A image url e.g. https://placehold.it/32x32 (optional)
	 * @var string(255) $imageUrl
	 */
	public $imageUrl = NULL;
	/**
	 * Amount discount setter
	 * @param long $value
	 * @return \Heidelpay\PhpBasketApi\Object\ItemObject
	 */
	public function setAmountDiscount($value=NULL)
	{
		$this->amountDiscount = $value;
		return $this;
	}
	/**
	 * Amount gross setter
	 * @param long $value
	 * @return \Heidelpay\PhpBasketApi\Object\ItemObject
	 */
	public function setAmountGross($value=NULL)
	{
		$this->amountGross = $value;
		return $this;
	}
	/**
	 * Amount net setter
	 * @param long $value
	 * @return \Heidelpay\PhpBasketApi\Object\ItemObject
	 */
	public function setAmountNet($value=NULL)
	{
		$this->amountNet = $value;
		return $this;
	}
	/**
	 * Amount per unit setter
	 * @param long $value
	 */
	public function setAmountPerUnit($value=NULL)
	{
		$this->amountPerUnit = $value;
	}
	/**
	 * Amount vat setter
	 * @param long $value
	 * @return \Heidelpay\PhpBasketApi\Object\ItemObject
	 */
	public function setAmountVat($value=NULL) 
	{
		$this->amountNet = $value;
		return $this;
	}
	/**
	 * Article id setter
	 * @param string(255) $value
	 * @return \Heidelpay\PhpBasketApi\Object\ItemObject
	 */
	public function setArticleId($value=NULL)
	{
		$this->articleId = $value;
		return $this;
	}
	/**
	 * Basket item reference id setter
	 * @param string(255) $value
	 * @return \Heidelpay\PhpBasketApi\Object\ItemObject
	 */
	public function setBasketItemReferenceId($value=NULL)
	{
		$this->basketitemReferenceId = $value;
		return $this;
	}
	/**
	 * Description setter
	 * @param string(255) $value
	 * @return \Heidelpay\PhpBasketApi\Object\ItemObject
	 */
	public function setDescription($value=NULL)
	{
		$this->description = $value;
		return $this;
	}
	/**
	 * Image url setter
	 * 
	 * if possible provide a https source, http images could be blocked du to
	 * browser securtiy restrictions.
	 * @param string(255) $value
	 * @return \Heidelpay\PhpBasketApi\Object\ItemObject
	 */
	public function setImageUrl($value=NULL)
	{
		$this->imageUrl = $value;
		return $this;
	}
	/**
	 * Position setter
	 * @param long $value
	 * @return \Heidelpay\PhpBasketApi\Object\ItemObject
	 */
	public function setPosition($value=NULL)
	{
		$this->position = $value;
		return $this;
	}
	/**
	 * Quantity setter
	 * @param long $value
	 * @return \Heidelpay\PhpBasketApi\Object\ItemObject
	 */
	public function setQuantity($value=NULL)
	{
		$this->quantity = $value;
		return $this;
	}
	/**
	 * Title setter
	 * @param string(255) $value
	 * @return \Heidelpay\PhpBasketApi\Object\ItemObject
	 */
	public function setTitle($value=NULL)
	{
		$this->title = $value;
		return $this;
	}
	/**
	 * Type setter
	 * @param string(255) $value
	 * @return \Heidelpay\PhpBasketApi\Object\ItemObject
	 */
	public function setType($value=NULL)
	{
		$this->type = $value;
		return $this;
	}
	/**
	 * Unit setter
	 * @param string(255) $value
	 * @return \Heidelpay\PhpBasketApi\Object\ItemObject
	 */
	public function setUnit($value=NULL)
	{
		$this->unit = $value;
		return $this;
	}
	/**
	 * Vat setter
	 * @param long $value
	 * @return \Heidelpay\PhpBasketApi\Object\ItemObject
	 */
	public function setVat($value=NULL)
	{
		$this->vat = $value;
		return $this;
	}
}