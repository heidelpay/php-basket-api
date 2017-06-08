<?php

namespace Heidelpay\Tests\PhpBasketApi\Unit\Object;

use Heidelpay\PhpBasketApi\Exception\InvalidBasketitemIdException;
use Heidelpay\PhpBasketApi\Object\Basket;
use Heidelpay\PhpBasketApi\Object\BasketItem;
use PHPUnit\Framework\TestCase;

/**
 * Tests for the PHP Basket API Object
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link https://dev.heidelpay.de/php-basket-api
 * @author Jens Richter
 * @package heidelpay\php-basket-api\tests\unit
 */
class BasketTest extends TestCase
{
    /** @var Basket the testing fixture */
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

    public function testAddAndDeleteBasketItems()
    {
        $item = new BasketItem();

        $this->basket->addBasketItem($item);
        $this->basket->addBasketItem($item);
        $this->basket->addBasketItem($item);

        $this->assertEquals(3, $this->basket->getItemCount());

        /* test for single item object */
        $result = (array_key_exists(0, $this->basket->getBasketItems())) ? true : false;
        $this->assertTrue($result, 'Object does not contain an item');

        /* Test for multible item objects */

        /* test update item object by id */
        $title = 'fish and chips';
        $this->basket->updateBasketItem($item->setTitle($title), 1);
        $this->assertEquals($title, $this->basket->getBasketItemByPosition(1)->getTitle());
        $this->assertEquals($title, $this->basket->getBasketItems()[0]->getTitle());

        /* test delete item object form basket  */
        $this->basket->deleteBasketItemByPosition(1);
        $result = $this->basket->getBasketItemByPosition(2) ? true : false;
        $this->assertTrue($result, 'More then one item has been deleted');

        $result = $this->basket->getBasketItemByPosition(1) ? true : false;
        $this->assertFalse($result, 'Item object has not been removed from basket');
        $this->assertNull($this->basket->getBasketItemByPosition(1));

        $this->expectException(InvalidBasketitemIdException::class);
        $this->basket->getBasketItemByPosition(0);
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

        /* delect one item from object */
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
}
