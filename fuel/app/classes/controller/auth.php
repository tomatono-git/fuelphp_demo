<?php

use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\Input;
use Fuel\Core\View;
use Auth\Auth;

/**
 * Auth Controller.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Auth extends Controller_Template_Base
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_login()
	{
        if (Input::post())
        {
            if (Auth::login(Input::post('email'), Input::post('password')))
            {
                Response::redirect('home/index');
            }
            else
            {
                $presenter = $this->forge('auth/login');
                $presenter->view();
                Session::set_flash('error', 'Wrong username/password combo. Try again');
            }
        } else {
            $presenter = $this->forge('auth/login');
            $presenter->view();
        }
    }

    public function action_logout()
    {
        if ( Auth::logout() )
        {
            Response::redirect('auth/login');
        }
        else
        {
            Response::redirect('welcome/index');
        }
    }

	public function action_register()
	{
		if (Input::method() == 'POST')
		{
			// $validation = Validation_Auth_Register::validate();
			$validation = Model_User::validate('sign_up');
			if ($validation->run())
			{
                $username = Input::post('username');
                $password = Input::post('password');
                $email = Input::post('email');
                // テストユーザーを追加
                $success = Auth::create_user($username, $password, $email);
                if($success)
                {
                    // 登録成功
                    Session::set_flash('success', 'Added user #'.$username.'.');
                    Response::redirect('users');
                }
                else
                {
                    // 登録失敗
                    Session::set_flash('error', 'Could not save user.');
                }
			}
			else
			{
                // 入力エラー
				Session::set_flash('error', $validation->error());
			}
		}

        $presenter = $this->forge('auth/register');
		$presenter->view();
	}

    public function action_lostpassword()
	{
		$data["subnav"] = array('lostpassword'=> 'active' );
		$this->template->title = 'Auth &raquo; Lostpassword';
		$this->template->content = View::forge('auth/lostpassword', $data);
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
