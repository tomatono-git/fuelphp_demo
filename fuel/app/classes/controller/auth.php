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
    // public function before()
    // {
    //     $response = parent::before();

    //     $active = Request::active();
    //     if ($active->controller !== 'Controller_Welcome') {
    //         $noauth_list = ['login', 'logout'];
    //         if ( !in_array(Request::active()->action, $noauth_list, true) )
    //         {
    //             if (!Auth::check())
    //             {
    //                 Session::set_flash('error', 'You must be logged in.');
    //                 Response::redirect('auth/login');
    //                 return;
    //             }
    //         }    
    //     }
    //     // if ( in_array(Request::active()->action, $noauth_list, true) && !Auth::check())
    //     // {
    //     //     Session::set_flash('error', 'You must be logged in.');
    //     //     Response::redirect('auth/login');
    //     // }

    //     return $response;
    // }

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_login()
	{
		// $data["subnav"] = array('login'=> 'active' );
		// $this->template->title = 'ログイン';

        $data = array();

        if (Input::post())
        {
            if (Auth::login(Input::post('email'), Input::post('password')))
            {
                Response::redirect('home/index');
            }
            else
            {
                $data['username'] = Input::post('username');
                Session::set_flash('error', 'Wrong username/password combo. Try again');
            }
        } else {
            $this->template->title = 'ログイン';
            $this->template->content = View::forge('auth/login', $data);
        }

        // $this->template->title = 'Auth &raquo; Login';

        // $this->template->content = View::forge('home/index', $data);

        // // すでにログイン済み？
        // if (\Auth::check())
        // {
        //     \Messages::info(__('login.already-logged-in'));
        //     \Response::redirect_back('dashboard');
        // }

        // if (\Input::method() == 'POST')
        // {
        //     // 資格情報のチェック
        //     if (\Auth::instance()->login(\Input::param('username'), \Input::param('password')))
        //     {
        //         if (\Input::param('remember', false))
        //         {
        //             // remember-me クッキーを作成
        //             \Auth::remember_me();
        //         }
        //         else
        //         {
        //             // 存在する場合、 remember-me クッキーを削除
        //             \Auth::dont_remember_me();
        //         }

        //         \Response::redirect_back('dashboard');
        //     }
        //     else
        //     {
        //         // ログイン失敗、エラーメッセージを表示
        //         \Messages::error(__('login.failure'));
        //     }
        // }

        // // ログインページを表示
        // return \View::forge('auth/index');
    }

    public function action_logout()
    {
        if ( Auth::logout() )
        {
            Response::redirect('auth/login');
            // Response::redirect('home/index');
        }
        else
        {
            Response::redirect('welcome/index');
            // Response::redirect('auth/login');
            // Session::set_flash('error', 'Logout failed.');
            // Response::redirect_back('welcome/index', 'refresh');
        }

        // $data["subnav"] = array('logout'=> 'active' );
		// $this->template->title = 'Auth &raquo; Logout';
		// $this->template->content = View::forge('auth/logout', $data);

        // // remember-me クッキーを削除
        // \Auth::dont_remember_me();
    
        // // ログアウト
        // \Auth::logout();
    
        // // ログアウトの成功をユーザーに知らせる
        // \Messages::success(__('login.logged-out'));
    
        // \Response::redirect_back();
    }

	public function action_register()
	{
		$data["subnav"] = array('register'=> 'active' );
		$this->template->title = 'Auth &raquo; Register';
		$this->template->content = View::forge('auth/register', $data);
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
