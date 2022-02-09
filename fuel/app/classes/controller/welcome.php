<?php

use Fuel\Core\Response;
use Fuel\Core\View;
use Fuel\Core\Controller;
use Auth\Auth;

/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.2
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		return Response::forge(View::forge('welcome/index'));
	}

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_phpinfo()
	{
		// // TODO debug
		// phpinfo();
		// Auth::create_user('test_user', 'pass', 'test@example.com');
		return Response::forge(View::forge('welcome/phpinfo'));
	}

	/**
	 * テストユーザーを追加
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_add_test_user()
	{
		// テストユーザーを取得
		$user = Model_User::find('first', [
			'where' => [
				['email', 'test@example.com']
			],
		]);

		if ($user)
		{
			// ログイン画面
			Response::redirect('auth/login');
		}
		else
		{
			// テストユーザーを追加
			Auth::create_user('test_user', 'pass', 'test@example.com');
		}
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a Presenter to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		return Response::forge(Presenter::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
