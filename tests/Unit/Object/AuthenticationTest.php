<?php

namespace Heidelpay\Tests\PhpBasketApi\Unit\Object;

use Heidelpay\PhpBasketApi\Object\Authentication;
use PHPUnit\Framework\TestCase;

/**
 * heidelpay PHP Basket API AuthenticationTest
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link  https://dev.heidelpay.de/php-basket-api
 * @author Jens Richter
 * @package heidelpay\php-basket-api\tests\unit
 */
class AuthenticationTest extends TestCase
{
    /** @var Authentication the testing fixture */
    protected $authentication;

    /**
     * Sets up the Authentication fixture
     */
    public function setUp()
    {
        $this->authentication = new Authentication();
    }

    /**
     * Login test
     */
    public function testLogin()
    {
        $value = '31ha07bc813e35b1a4e0207aea2a151e';

        $this->assertNull($this->authentication->getLogin());

        $this->authentication->setLogin($value);
        $this->assertEquals($value, $this->authentication->getLogin());

        $this->authentication->setLogin(null);
        $this->assertEquals(null, $this->authentication->getLogin());

        $this->authentication->setLogin($value);
        $this->assertEquals($value, $this->authentication->getLogin());
    }

    /**
     * Password test
     */
    public function testPassword()
    {
        $value = '3E3834A7';

        $this->assertNull($this->authentication->getPassword());

        $this->authentication->setPassword($value);
        $this->assertEquals($value, $this->authentication->getPassword());
    }

    /**
     * Sender test
     */
    public function testSender()
    {
        $value = '31HA07BC813E35B1A4E034FE5EF89A24';

        $this->assertNull($this->authentication->getSender());

        $this->authentication->setSender($value);
        $this->assertEquals($value, $this->authentication->getSender());
    }

    /**
     * Test of all 3 authentication parameters.
     */
    public function testAuthentication()
    {
        $login = '31ha07bc813e35b1a4e0207aea2a151e';
        $password = '3E3834A7';
        $senderId = '31HA07BC813E35B1A4E034FE5EF89A24';

        // assignment with setters
        $this->authentication->setLogin($login);
        $this->authentication->setPassword($password);
        $this->authentication->setSender($senderId);

        $this->assertEquals($login, $this->authentication->getLogin());
        $this->assertEquals($password, $this->authentication->getPassword());
        $this->assertEquals($senderId, $this->authentication->getSender());

        // assignment with constructor parameters
        $object = new Authentication($login, $password, $senderId);
        $this->assertEquals($login, $object->getLogin());
        $this->assertEquals($password, $object->getPassword());
        $this->assertEquals($senderId, $object->getSender());
    }
}
