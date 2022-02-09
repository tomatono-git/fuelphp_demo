<?php

use Fuel\Core\Request;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\Controller_Template;
use Auth\Auth;

/**
 * Auth Controller.
 *
 * @package  app
 * @extends  Controller
 */
abstract class Controller_Authenticated extends Controller_Template
{
    public function before()
    {
        $response = parent::before();

        $active = Request::active();
        if ($active->controller !== 'Controller_Welcome') {
            $noauth_list = ['login', 'logout'];
            if ( !in_array(Request::active()->action, $noauth_list, true) )
            {
                if (!Auth::check())
                {
                    Session::set_flash('error', 'You must be logged in.');
                    Response::redirect('auth/login');
                    return;
                }
            }    
        }
        // if ( in_array(Request::active()->action, $noauth_list, true) && !Auth::check())
        // {
        //     Session::set_flash('error', 'You must be logged in.');
        //     Response::redirect('auth/login');
        // }

        return $response;
    }

}