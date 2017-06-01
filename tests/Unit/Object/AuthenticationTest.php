<?php

namespace Heidelpay\Tests\Unit\PhpBasketApi\Object;

use Heidelpay\PhpBasketApi\Object\Authentication;
use PHPUnit\Framework\TestCase;

/**
 * heidelpay PHP Basket API AuthenticationTest
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link  https://dev.heidelpay.de/php-basket-api
 * @author Jens Richter
 * @package heidelpay\php-basket-api\unit-test
 */
class AuthenticationTest extends TestCase
{
    /**
     * Login test
     */
    public function testLogin()
    {
        $value = '31ha07bc813e35b1a4e0207aea2a151e';

        $object = new Authentication();
        $object->setLogin($value);

        $this->assertEquals($value, $object->login);
    }

    /**
     * Password test
     */
    public function testPassword()
    {
        $value = '3E3834A7';

        $object = new Authentication();
        $object->setPassword($value);

        $this->assertEquals($value, $object->password);
    }

    /**
     * Sender test
     */
    public function testSender()
    {
        $value = '31HA07BC813E35B1A4E034FE5EF89A24';

        $object = new Authentication();
        $object->setSender($value);

        $this->assertEquals($value, $object->sender);
    }

    /**
     * Test of all 3 authentication parameters.
     */
    public function testAuthentication()
    {
        $login = '31ha07bc813e35b1a4e0207aea2a151e';
        $password = '3E3834A7';
        $senderId = '31HA07BC813E35B1A4E034FE5EF89A24';

        $object = new Authentication();
        $object->setLogin($login);
        $object->setPassword($password);
        $object->setSender($senderId);

        $this->assertEquals($login, $object->login);
        $this->assertEquals($password, $object->password);
        $this->assertEquals($senderId, $object->sender);
    }
}
