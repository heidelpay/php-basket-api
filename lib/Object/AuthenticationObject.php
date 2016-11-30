<?php
namespace Heidelpay\PhpBasketApi\Object;

/**
 *  Authentication object for heidelpay basket api
 *
 * @license Use of this software requires acceptance of the License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 * @link  https://dev.heidelpay.de/php-basket-api
 * @author  Jens Richter
 * @package  Heidelpay
 * @subpackage php-basket-api
 * @category php-basket-api
 */

class AuthenticationObject {
	/**
	 * heidelpay user login 
	 * @var string(32) login
	 */
	public $login = NULL;
	/**
	 * heidelpay user password
	 * @var string password
	 */
	public $password = NULL;
	/**
	 * heidelpay sender id
	 * @var string(32) sender
	 */
	public $sender = NULL;
	/**
	 * heidelpay user login
	 * @param string(32) $login
	 * @return \Heidelpay\PhpBasketApi\Object\Autentication
	 */
	public function setLogin($login) 
	{
		$this->login = $login;
		return $this;
	}
	/**
	 * heidelpay user password
	 * @param string $password
	 * @return \Heidelpay\PhpBasketApi\Object\Autentication
	 */
	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}
	/**
	 * heidelpay sender id
	 * @param string(32) $sender
	 * @return \Heidelpay\PhpBasketApi\Object\Autentication
	 */
	public function setSender($sender)
	{
		$this->sender = $sender;
		return $this;
	}
}