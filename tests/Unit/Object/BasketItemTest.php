<?php

namespace Heidelpay\Tests\PhpBasketApi\Unit\Object;

use Heidelpay\PhpBasketApi\Object\BasketItem;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for the BasketItem Objects
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link https://dev.heidelpay.de/php-basket-api
 * @author Stephano Vogel
 * @package heidelpay\php-basket-api\tests\unit
 */
class BasketItemTest extends TestCase
{
    /** @var BasketItem the testing fixture */
    protected $basketItem;

    /**
     * Sets up the BasketItem fixture
     */
    public function setUp()
    {
        $this->basketItem = new BasketItem();
    }

    /**
     * Unit test for the position
     */
    public function testPosition()
    {
        $position3 = 3;
        $position1 = 1;

        $this->assertNull($this->basketItem->getPosition());

        $this->basketItem->setPosition($position3);
        $this->assertEquals($position3, $this->basketItem->getPosition());

        $this->basketItem->setPosition($position1);
        $this->assertEquals($position1, $this->basketItem->getPosition());
    }

    /**
     * Unit test for the Basketitem Reference Id
     */
    public function testBasketItemReferenceId()
    {
        $referenceId = '136d24be-12b0-7d076a9e';

        $this->assertNull($this->basketItem->getBasketItemReferenceId());

        $this->basketItem->setBasketItemReferenceId($referenceId);
        $this->assertEquals($referenceId, $this->basketItem->getBasketItemReferenceId());
    }

    /**
     * Unit test for the unit
     */
    public function testUnit()
    {
        $unit = 'Pc.';
        $unit2 = 'Stk.';

        $this->assertNull($this->basketItem->getUnit());

        $this->basketItem->setUnit($unit);
        $this->assertEquals($unit, $this->basketItem->getUnit());

        $this->basketItem->setUnit($unit2);
        $this->assertEquals($unit2, $this->basketItem->getUnit());
    }

    /**
     * Unit test for the quantity
     */
    public function testQuantity()
    {
        $quantity = 3;
        $quantity2 = 2;

        $this->assertNull($this->basketItem->getQuantity());

        $this->basketItem->setQuantity($quantity);
        $this->assertEquals($quantity, $this->basketItem->getQuantity());

        $this->basketItem->setQuantity($quantity2);
        $this->assertEquals($quantity2, $this->basketItem->getQuantity());
    }

    /**
     * Unit test for the discount amount
     */
    public function testAmountDiscount()
    {
        $amountDiscount0 = 0;
        $amountDiscount20 = 20;

        $this->assertNull($this->basketItem->getAmountDiscount());

        $this->basketItem->setAmountDiscount($amountDiscount0);
        $this->assertEquals($amountDiscount0, $this->basketItem->getAmountDiscount());

        $this->basketItem->setAmountDiscount($amountDiscount20);
        $this->assertEquals($amountDiscount20, $this->basketItem->getAmountDiscount());
    }

    /**
     * Unit test for the vat
     */
    public function testVat()
    {
        $vat19 = 19;
        $vat7 = 7;

        $this->assertNull($this->basketItem->getVat());

        $this->basketItem->setVat($vat19);
        $this->assertEquals($vat19, $this->basketItem->getVat());

        $this->basketItem->setVat($vat7);
        $this->assertEquals($vat7, $this->basketItem->getVat());
    }

    /**
     * Unit test for the amount per unit
     */
    public function testAmountPerUnit()
    {
        $amountPerUnit750 = 750;
        $amountPerUnit7999 = 7999;

        $this->assertNull($this->basketItem->getAmountPerUnit());

        $this->basketItem->setAmountPerUnit($amountPerUnit750);
        $this->assertEquals($amountPerUnit750, $this->basketItem->getAmountPerUnit());

        $this->basketItem->setAmountPerUnit($amountPerUnit7999);
        $this->assertEquals($amountPerUnit7999, $this->basketItem->getAmountPerUnit());
    }

    /**
     * Unit test for the net amount
     */
    public function testAmountNet()
    {
        $amountNet630 = 630;
        $amountNet6722 = 6722;

        $this->assertNull($this->basketItem->getAmountNet());

        $this->basketItem->setAmountNet($amountNet630);
        $this->assertEquals($amountNet630, $this->basketItem->getAmountNet());

        $this->basketItem->setAmountNet($amountNet6722);
        $this->assertEquals($amountNet6722, $this->basketItem->getAmountNet());
    }

    /**
     * Unit test for the gross amount
     */
    public function testAmountGross()
    {
        $amountGross750 = 750;
        $amountGross7999 = 7999;

        $this->assertNull($this->basketItem->getAmountGross());

        $this->basketItem->setAmountGross($amountGross750);
        $this->assertEquals($amountGross750, $this->basketItem->getAmountGross());

        $this->basketItem->setAmountGross($amountGross7999);
        $this->assertEquals($amountGross7999, $this->basketItem->getAmountGross());
    }

    /**
     * Unit test for the vat amount
     */
    public function testAmountVat()
    {
        $amountVat120 = 120;
        $amountVat1277 = 1277;

        $this->assertNull($this->basketItem->getAmountVat());

        $this->basketItem->setAmountVat($amountVat120);
        $this->assertEquals($amountVat120, $this->basketItem->getAmountVat());

        $this->basketItem->setAmountVat($amountVat1277);
        $this->assertEquals($amountVat1277, $this->basketItem->getAmountVat());
    }

    /**
     * Unit test for the article id
     */
    public function testArticleId()
    {
        $articleId = '223302316';

        $this->assertNull($this->basketItem->getArticleId());

        $this->basketItem->setArticleId($articleId);
        $this->assertEquals($articleId, $this->basketItem->getArticleId());
    }

    /**
     * Unit test for the type
     */
    public function testType()
    {
        $typeShipping = 'shipping';
        $typeGoods = 'goods';

        $this->assertNull($this->basketItem->getType());

        $this->basketItem->setType($typeShipping);
        $this->assertEquals($typeShipping, $this->basketItem->getType());

        $this->basketItem->setType($typeGoods);
        $this->assertEquals($typeGoods, $this->basketItem->getType());
    }

    /**
     * Unit test for the title
     */
    public function testTitle()
    {
        $titleShipping = 'Shipping';
        $titleHeadphone = 'Wireless RF Headphone';

        $this->assertNull($this->basketItem->getTitle());

        $this->basketItem->setTitle($titleShipping);
        $this->assertEquals($titleShipping, $this->basketItem->getTitle());

        $this->basketItem->setTitle($titleHeadphone);
        $this->assertEquals($titleHeadphone, $this->basketItem->getTitle());
    }

    /**
     * Unit test for the description
     */
    public function testDescription()
    {
        $descriptionEmpty = '';
        $descriptionHeadphone = 'Wireless RF Headphone, Black';

        $this->assertNull($this->basketItem->getDescription());

        $this->basketItem->setDescription($descriptionEmpty);
        $this->assertEquals('', $this->basketItem->getDescription());
        $this->assertEmpty($this->basketItem->getDescription());

        $this->basketItem->setDescription($descriptionHeadphone);
        $this->assertEquals($descriptionHeadphone, $this->basketItem->getDescription());
    }

    /**
     * Unit test for the image url
     */
    public function testImageUrl()
    {
        $imageUrlEmpty = '';
        $imageUrlPlaceHoldIt = 'https://placehold.it/236566083.jpg';

        $this->assertNull($this->basketItem->getImageUrl());

        $this->basketItem->setImageUrl($imageUrlEmpty);
        $this->assertEquals($imageUrlEmpty, $this->basketItem->getImageUrl());

        $this->basketItem->setImageUrl($imageUrlPlaceHoldIt);
        $this->assertEquals($imageUrlPlaceHoldIt, $this->basketItem->getImageUrl());
    }
}
