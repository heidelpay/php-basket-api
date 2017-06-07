<?php

namespace Heidelpay\Tests\PhpBasketApi\Integration;

use Heidelpay\PhpBasketApi\Object\Authentication;
use Heidelpay\PhpBasketApi\Object\Basket;
use Heidelpay\PhpBasketApi\Object\BasketItem;
use Heidelpay\PhpBasketApi\Request;
use Heidelpay\PhpBasketApi\Response;
use PHPUnit\Framework\TestCase;

/**
 * Integration Testsuite for all requests to the API
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link https://dev.heidelpay.de/php-basket-api
 * @author Stephano Vogel
 * @package heidelpay\php-basket-api\tests\integration
 */
class RequestTest extends TestCase
{
    /**
     * @var string constant for test login user
     */
    const AUTH_LOGIN = '31ha07bc8142c5a171744e5aef11ffd3';

    /**
     * @var string constant for test login password
     */
    const AUTH_PASSWORD = '93167DE7';

    /**
     * @var string constant for test sender id
     */
    const AUTH_SENDER_ID = '31HA07BC8142C5A171745D00AD63D182';

    /**
     * @var Authentication the authentication object for all requests
     */
    protected $auth;

    /**
     * @var Basket the basket object for all requests
     */
    protected $basket;

    /**
     * Set up the fixture objects for all requests.
     */
    public function setUp()
    {
        // set the Authentication
        $this->auth = new Authentication(self::AUTH_LOGIN, self::AUTH_PASSWORD, self::AUTH_SENDER_ID);

        // set up a basket
        $this->basket = new Basket();
        $this->basket->setAmountTotalNet(8192);
        $this->basket->setAmountTotalVat(1557);
        $this->basket->setAmountTotalDiscount(0);
        $this->basket->setCurrencyCode('EUR');
        $this->basket->setBasketReferenceId('heidelpay-php-basket-api-integration-test-' . date('Y-m-d-H-i-s'));
        $this->basket->setNote('heidelpay php-basket-api test basket');

        // set up a first basket item
        $basketItemOne = new BasketItem();
        $basketItemOne->setPosition(1);
        $basketItemOne->setBasketItemReferenceId('heidelpay-php-basket-api-testitem-' . date('Y-m-d-H-i-s') . '-1');
        $basketItemOne->setUnit('Stk.');
        $basketItemOne->setArticleId('heidelpay-testitem-1');
        $basketItemOne->setTitle('Heidelpay Test Article #1');
        $basketItemOne->setDescription('Just for testing.');
        $basketItemOne->setType('goods');
        $basketItemOne->setImageUrl('https://placehold.it/223302316.jpg');
        $basketItemOne->setQuantity(1);
        $basketItemOne->setVat(19);
        $basketItemOne->setAmountPerUnit(1000);
        $basketItemOne->setAmountNet(840);
        $basketItemOne->setAmountGross(1000);
        $basketItemOne->setAmountVat(160);
        $basketItemOne->setAmountDiscount(0);

        // set up a second basket item
        $basketItemTwo = new BasketItem();
        $basketItemTwo->setPosition(2);
        $basketItemTwo->setBasketItemReferenceId('heidelpay-php-basket-api-testitem-' . date('Y-m-d-H-i-s') . '-2');
        $basketItemTwo->setUnit('Stk.');
        $basketItemTwo->setArticleId('heidelpay-testitem-2');
        $basketItemTwo->setTitle('Heidelpay Test Article #2');
        $basketItemTwo->setDescription('Just for testing.');
        $basketItemTwo->setType('goods');
        $basketItemTwo->setImageUrl('https://placehold.it/236566083.jpg');
        $basketItemTwo->setQuantity(1);
        $basketItemTwo->setVat(19);
        $basketItemTwo->setAmountPerUnit(7999);
        $basketItemTwo->setAmountNet(6722);
        $basketItemTwo->setAmountGross(7999);
        $basketItemTwo->setAmountVat(1277);
        $basketItemTwo->setAmountDiscount(0);

        // set up a third basket item (shipping)
        $basketItemThree = new BasketItem();
        $basketItemThree->setPosition(3);
        $basketItemThree->setBasketItemReferenceId('heidelpay-php-basket-api-testitem-' . date('Y-m-d-H-i-s') . '-3');
        $basketItemThree->setUnit('Stk.');
        $basketItemThree->setArticleId('heidelpay-testitem-3');
        $basketItemThree->setTitle('Heidelpay Test Article #3');
        $basketItemThree->setDescription('Just for testing.');
        $basketItemThree->setType('goods');
        $basketItemThree->setImageUrl('https://placehold.it/236566083.jpg');
        $basketItemThree->setQuantity(1);
        $basketItemThree->setVat(19);
        $basketItemThree->setAmountPerUnit(750);
        $basketItemThree->setAmountNet(630);
        $basketItemThree->setAmountGross(750);
        $basketItemThree->setAmountVat(120);
        $basketItemThree->setAmountDiscount(0);

        $this->basket->addBasketItem($basketItemOne);
        $this->basket->addBasketItem($basketItemTwo);
        $this->basket->addBasketItem($basketItemThree);
    }

    public function testAddNewBasket()
    {
        $request = new Request($this->auth, $this->basket);
        $response = $request->addNewBasket();

        $this->assertEquals(Response::RESULT_ACK, $response->getResult());
        $this->assertEquals('addNewBasket', $response->getMethod());
        $this->assertNotEquals(null, $response->getBasketId(), 'BasketId is null.');
        $this->assertNotEquals(null, $response->getResult(), 'Result is null.');
        $this->assertNotEquals(null, $response->getMethod(), 'Method is null.');
        $this->assertTrue($response->isSuccess(), 'Response is not success.');
        $this->assertFalse($response->isFailure(), 'Response is failure.');

        return $response->getBasketId();
    }

    /**
     * Tests if the basket that was just submitted can be retrieved by it's id.
     * @depends testAddNewBasket
     *
     * @param string $basketId
     */
    public function testRetrieveBasket($basketId)
    {
        $request = new Request($this->auth);
        $response = $request->retrieveBasket($basketId);

        $this->assertEquals(Response::RESULT_ACK, $response->getResult());
        $this->assertEquals('getBasket', $response->getMethod());
        $this->assertEquals($basketId, $response->getBasketId());
    }
}
