<?php
namespace Heidelpay\Tests\Unit\PhpBasketApi\Object;
use PHPUnit\Framework\TestCase;
use \Heidelpay\PhpBasketApi\Object\BasketObject;
/**
 *  Basket object for heidelpay api
 *
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link  https://dev.heidelpay.de/php-basket-api
 * @author  Jens Richter
 *
 * @package  Heidelpay
 * @subpackage php-basket-api
 * @category unittest
 */
class BasketObjectTest extends TestCase {
    
	/**
	 * getter and setter test for amountTotal
	 */
   public function testAmountTotal() 
   {
       $Object = new BasketObject();
       
       $value = "20.21";
       
       $Object->setAmountTotal($value);
       
       $this->assertEquals($value, $Object->getAmountTotal());
   }
   /**
    * getter and setter test for amountTotalNet
    */
   public function testAmountTotalNet()
   {
       $Object = new BasketObject();
       
       $value = "20";
       
       $Object->setAmountTotalNet($value);
       
       $this->assertSame(floatval($value), $Object->getAmountTotalNet());
       
   }
   /**
    * getter and setter test for amountTotalVat
    */
   public function testAmountTotalVat()
   {
   	$Object = new BasketObject();
   	 
   	$value = "7.00";
   	 
   	$Object->setAmountTotalVat($value);
   	 
   	$this->assertSame(floatval($value), $Object->getAmountTotalVat());
   	 
   }
   
   public function testBasketItems()
   {
   	$Object = new \Heidelpay\PhpBasketApi\Object\BasketObject();
   	
   	$item = new \Heidelpay\PhpBasketApi\Object\ItemObject();
   	
   $Object->addBasketItem($item);
   $Object->addBasketItem($item);
   $Object->addBasketItem($item);
   
   /* test for single item object */
   	$result = (array_key_exists('0', $Object->getAllBasketItems())) ? TRUE : FALSE;
   	$this->assertTrue($result, 'Object does not contain an item');
   	
   	/* Test for multible item objects */
   	
   	/* test update item object by id */
   	$title = 'fish and chips';
   	$Object->updateBasketItemById( 1 , $item->setTitle($title));
   	$this->assertEquals($title, $Object->getBasketItemById(1)->title);
   	
   	/* test delete item object form basket  */
   	$Object->deletBasketItemById(1);
   	$result = (array_key_exists('0', $Object->getAllBasketItems())) ? TRUE : FALSE;
   	$this->assertTrue($result, 'More then one item has been deleted');
   	 
   	$result = (array_key_exists('1', $Object->getAllBasketItems())) ? TRUE : FALSE;
   	$this->assertFalse($result, 'Item object has not been removed from basket');
   }
   
   /**
    * test basket reference id
    */
   
   public function testBasketReferenceId()
   {
   	$Object = new BasketObject();
   	
   	$value = '26343294';
   	
   	$Object->setBasketReferenceId($value);
   	
   	$this->assertEquals($value, $Object->getBasketReferenceId());
   }
   
   /**
    * test currency code
    */
   
   public function testCurrencyCode()
   {
   	$Object = new BasketObject();
   	
   	$value = "EUR";
   	
   	$Object->setCurrencyCode($value);
   	
   	$this->assertEquals($value, $Object->getCurrencyCode());
   }
   
   /**
    * test item count
    */
   
   public function testItemCount()
   {
   	$Object = new BasketObject();
   	$this->assertEquals(0, $Object->getItemCount()); 
   	
   	$item = new \Heidelpay\PhpBasketApi\Object\ItemObject();
   	$Object->addBasketItem($item);
   	$this->assertEquals(1, $Object->getItemCount()); 
   	$Object->addBasketItem($item);
   	$this->assertEquals(2, $Object->getItemCount());
   	/* delect one item from object */
   	$Object->deletBasketItemById(1);
   	$this->assertEquals(1, $Object->getItemCount());
   }
   
   /**
    * test basket note
    */
   public function testNote()
   {
   	$Object = new BasketObject();
   	
   	$value = 'Customer basket';
   	$Object->setNote($value);
   	
   	$this->assertEquals($value, $Object->getNote());
   }
}