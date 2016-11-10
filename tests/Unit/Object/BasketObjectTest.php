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
    
   public function testAmountTotal() 
   {
       $Object = new BasketObject();
       
       $value = "20.21";
       
       $Object->setAmountTotal($value);
       
       $this->assertEquals($value, $Object->getAmountTotal());
   }
   /**
    * @todo assertEquals does not detect string == float
    */
   public function testAmountTotalNet()
   {
       $Object = new BasketObject();
       
       $value = "20";
       
       $Object->setAmountTotalNet($value);
       
       $this->assertEquals((string)$value, $Object->getAmountTotalNet());
       
   }
}