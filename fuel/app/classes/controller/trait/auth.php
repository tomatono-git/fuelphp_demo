<?php

use Fuel\Core\Request;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Auth\Auth;

trait Controller_Trait_Auth
{
    protected function check_auth()
    {
        $active = Request::active();
        if ($active->controller !== 'Controller_Welcome') {
            $noauth_list = ['login', 'logout', 'register'];
            if ( !in_array(Request::active()->action, $noauth_list, true) )
            {
                if (!Auth::check())
                {
                    Session::set_flash('error', 'You must be logged in.');
                    Response::redirect('auth/login');
                }
            }    
        }
        $response = parent::before();

        return $response;        
    }

    protected function get_login_user_id()
    {
        $user = Auth::get_user_id();
        $user_id = $user[1];
        return $user_id;
    }
}
