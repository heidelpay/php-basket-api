<?php

namespace Heidelpay\Tests\PhpBasketApi\Unit\Object;

use Heidelpay\PhpBasketApi\Exception\InvalidBasketitemIdException;
use Heidelpay\PhpBasketApi\Object\Basket;
use Heidelpay\PhpBasketApi\Object\BasketItem;
use PHPUnit\Framework\TestCase;

/**
 * Tests for the PHP Basket API Object
 *
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 *
 * @link https://dev.heidelpay.de/php-basket-api
 *
 * @author Jens Richter
 *
 * @package heidelpay\php-basket-api\tests\unit\basket
 */
class BasketTest extends TestCase
{
    /**
     * @var Basket the testing fixture
     */
    protected $basket;

    /**
     * Sets up the Basket fixture
     */
    public function setUp()
    {
        $this->basket = new Basket();
    }

    /**
     * getter and setter test for amountTotalNet
     */
    public function testAmountTotalNet()
    {
        $value = 20;

        $this->basket->setAmountTotalNet($value);
        $this->assertSame($value, $this->basket->getAmountTotalNet());
    }

    /**
     * getter and setter test for amountTotalVat
     */
    public function testAmountTotalVat()
    {
        $value = 7;

        $this->basket->setAmountTotalVat($value);
        $this->assertSame($value, $this->basket->getAmountTotalVat());
    }

    /**
     * test for adding and removing BasketItems
     */
    public function testAddAndDeleteBasketItems()
    {
        $item = new BasketItem();
        $item2 = new BasketItem();
        $item3 = new BasketItem();

        $this->basket->addBasketItem($item);
        $this->basket->addBasketItem($item2);
        $this->basket->addBasketItem($item3);

        $this->assertEquals(3, $this->basket->getItemCount());

        // test for single item object
        $this->assertNotNull($this->basket->getBasketItemByPosition(1), 'Object does not contain an item');

        // test update item object by id
        $title = 'fish and chips';
        $this->basket->updateBasketItem($item->setTitle($title), 1);
        $this->assertEquals($title, $this->basket->getBasketItemByPosition(1)->getTitle());
        $this->assertEquals($title, $this->basket->getBasketItems()[0]->getTitle());

        // test delete item object form basket
        $this->basket->deleteBasketItemByPosition(1);
        $this->assertNotNull($this->basket->getBasketItemByPosition(2), 'More then one item has been deleted');

        $result = $this->basket->getBasketItemByPosition(1) ? true : false;
        $this->assertFalse($result, 'Item object has not been removed from basket');
        $this->assertNull($this->basket->getBasketItemByPosition(1));

        $this->expectException(InvalidBasketitemIdException::class);
        $this->basket->getBasketItemByPosition(0);

        //$this->expectException(InvalidBasketitemIdException::class);
        $this->basket->deleteBasketItemByPosition(0);

        //$this->expectException(InvalidBasketitemIdException::class);
        $this->basket->deleteBasketItemByPosition(42);

        $this->basket->deleteBasketItemByPosition(-1);
    }

    /**
     * Unit test for the BasketItemReferenceId
     */
    public function testBasketItemReferenceId()
    {
        $referenceId = 'heidelpay-basketitem-test';

        $item = new BasketItem();
        $item->setBasketItemReferenceId($referenceId);
        $this->basket->addBasketItem($item);

        $this->assertNotNull($this->basket->getBasketItemByReferenceId($referenceId));
        $this->assertNull($this->basket->getBasketItemByReferenceId('invalid-id'));

        $this->assertEquals($this->basket, $this->basket->deleteBasketItemByReferenceId($referenceId));
        $this->assertNull($this->basket->getBasketItemByReferenceId($referenceId));

        $this->expectException(InvalidBasketitemIdException::class);
        $this->basket->deleteBasketItemByReferenceId('invalid-id');
    }

    /**
     * test basket reference id
     */
    public function testBasketReferenceId()
    {
        $value = '26343294';

        $this->basket->setBasketReferenceId($value);
        $this->assertEquals($value, $this->basket->getBasketReferenceId());
    }

    /**
     * test currency code
     */
    public function testCurrencyCode()
    {
        $value = 'EUR';

        $this->basket->setCurrencyCode($value);
        $this->assertEquals($value, $this->basket->getCurrencyCode());
    }

    /**
     * test item count
     */
    public function testItemCount()
    {
        $this->assertEquals(0, $this->basket->getItemCount());

        $item = new BasketItem();
        $this->basket->addBasketItem($item);
        $this->assertEquals(1, $this->basket->getItemCount());

        $this->basket->addBasketItem($item);
        $this->assertEquals(2, $this->basket->getItemCount());

        // delect one item from object
        $this->basket->deleteBasketItemByPosition(1);
        $this->assertEquals(1, $this->basket->getItemCount());
    }

    /**
     * test basket note
     */
    public function testNote()
    {
        $value = 'Customer basket';

        $this->basket->setNote($value);
        $this->assertEquals($value, $this->basket->getNote());
    }

    /**
     * Unit test for Voucher amount
     */
    public function testVoucherAmount()
    {
        $voucherAmount = 2500;

        $this->assertNull($this->basket->getVoucherAmount());

        $this->basket->setVoucherAmount($voucherAmount);
        $this->assertEquals($voucherAmount, $this->basket->getVoucherAmount());
    }

    /**
     * Unit test for Voucher Id
     */
    public function testVoucherId()
    {
        $voucherId = 'HAPPYNEWYEAR';

        $this->assertNull($this->basket->getVoucherId());

        $this->basket->setVoucherId($voucherId);
        $this->assertEquals($voucherId, $this->basket->getVoucherId());
    }

    /**
     * Unit test for magic getters and setters
     */
    public function testMagicGetter()
    {
        $testValue = 'Test';

        // set test property and access it.
        $this->basket->setNote($testValue);
        $this->assertEquals($testValue, $this->basket->note);

        // access invalid property and get null.
        $this->assertNull($this->basket->test);
    }

    /**
     * Unit test for JSON
     */
    public function testJsonSerializable()
    {
        $this->assertNotEmpty($this->basket->jsonSerialize());

        $this->assertArrayHasKey('amountTotalNet', $this->basket->jsonSerialize());
        $this->assertArrayHasKey('amountTotalVat', $this->basket->jsonSerialize());
        $this->assertArrayHasKey('amountTotalDiscount', $this->basket->jsonSerialize());
        $this->assertArrayHasKey('basketReferenceId', $this->basket->jsonSerialize());
        $this->assertArrayHasKey('currencyCode', $this->basket->jsonSerialize());
        $this->assertArrayHasKey('itemCount', $this->basket->jsonSerialize());
        $this->assertArrayHasKey('note', $this->basket->jsonSerialize());
        $this->assertArrayHasKey('basketItems', $this->basket->jsonSerialize());

        $this->assertNotEmpty($this->basket->toJson());
    }
}
