<?php
namespace Heidelpay\Tests\Unit\PhpBasketApi\Object;
use PHPUnit\Framework\TestCase;
use \Heidelpay\PhpBasketApi\Object\AuthenticationObject;
/**
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
class AuthenticationObjectTest extends TestCase {
    
	/**
	 * Login test
	 */
   public function testLogin() 
   {
       $Object = new AuthenticationObject();
       
       $value = "31ha07bc813e35b1a4e0207aea2a151e";
       
       $Object->setLogin($value);
       
       $this->assertEquals($value, $Object->login);
   }
   
   /**
    * Password test
    */
   public function testPassword()
   {
    $Object = new AuthenticationObject();
   	 
   	$value = "3E3834A7";
   	 
   	$Object->setPassword($value);
   	 
   	$this->assertEquals($value, $Object->password);
   }
   /**
    * Sender test
    */
   public function testSender()
   {
    $Object = new AuthenticationObject();
   	 
   	$value = "31HA07BC813E35B1A4E034FE5EF89A24";
   	 
   	$Object->setSender($value);
   	 
   	$this->assertEquals($value, $Object->sender);
   }
}