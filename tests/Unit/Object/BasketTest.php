<?php

namespace Heidelpay\Tests\Unit\PhpBasketApi\Object;

use Heidelpay\PhpBasketApi\Object\Basket;
use Heidelpay\PhpBasketApi\Object\BasketItem;
use PHPUnit\Framework\TestCase;

/**
 * Tests for the PHP Basket API Object
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link https://dev.heidelpay.de/php-basket-api
 * @author Jens Richter
 * @package heidelpay\php-basket-api\unit-test
 */
class BasketTest extends TestCase
{
    /**
     * getter and setter test for amountTotal
     */
    public function testAmountTotal()
    {
        $value = '20.21';

        $object = new Basket();
        $object->setAmountTotal($value);

        $this->assertEquals($value, $object->getAmountTotal());
    }

    /**
     * getter and setter test for amountTotalNet
     */
    public function testAmountTotalNet()
    {
        $value = '20';

        $object = new Basket();
        $object->setAmountTotalNet($value);

        $this->assertSame(floatval($value), $object->getAmountTotalNet());
    }

    /**
     * getter and setter test for amountTotalVat
     */
    public function testAmountTotalVat()
    {
        $value = '7.00';

        $object = new Basket();
        $object->setAmountTotalVat($value);

        $this->assertSame(floatval($value), $object->getAmountTotalVat());
    }

    public function testBasketItems()
    {
        $object = new Basket();

        $item = new BasketItem();

        $object->addBasketItem($item);
        $object->addBasketItem($item);
        $object->addBasketItem($item);

        /* test for single item object */
        $result = (array_key_exists('0', $object->getAllBasketItems())) ? true : false;
        $this->assertTrue($result, 'Object does not contain an item');

        /* Test for multible item objects */

        /* test update item object by id */
        $title = 'fish and chips';
        $object->updateBasketItemById(1, $item->setTitle($title));
        $this->assertEquals($title, $object->getBasketItemById(1)->title);

        /* test delete item object form basket  */
        $object->deletBasketItemById(1);
        $result = (array_key_exists('0', $object->getAllBasketItems())) ? true : false;
        $this->assertTrue($result, 'More then one item has been deleted');

        $result = (array_key_exists('1', $object->getAllBasketItems())) ? true : false;
        $this->assertFalse($result, 'Item object has not been removed from basket');
    }

    /**
     * test basket reference id
     */

    public function testBasketReferenceId()
    {
        $value = '26343294';

        $object = new Basket();
        $object->setBasketReferenceId($value);

        $this->assertEquals($value, $object->getBasketReferenceId());
    }

    /**
     * test currency code
     */

    public function testCurrencyCode()
    {
        $value = 'EUR';

        $object = new Basket();
        $object->setCurrencyCode($value);

        $this->assertEquals($value, $object->getCurrencyCode());
    }

    /**
     * test item count
     */
    public function testItemCount()
    {
        $object = new Basket();
        $this->assertEquals(0, $object->getItemCount());

        $item = new BasketItem();
        $object->addBasketItem($item);
        $this->assertEquals(1, $object->getItemCount());

        $object->addBasketItem($item);
        $this->assertEquals(2, $object->getItemCount());

        /* delect one item from object */
        $object->deletBasketItemById(1);
        $this->assertEquals(1, $object->getItemCount());
    }

    /**
     * test basket note
     */
    public function testNote()
    {
        $value = 'Customer basket';

        $object = new Basket();
        $object->setNote($value);

        $this->assertEquals($value, $object->getNote());
    }
}