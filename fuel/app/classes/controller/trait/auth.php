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
            $noauth_list = ['login', 'logout'];
            if ( !in_array(Request::active()->action, $noauth_list, true) )
            {
                if (!Auth::check())
                {
                    Session::set_flash('error', 'You must be logged in.');
                    Response::redirect('auth/login');
                }
            }    
        }
        // if ( in_array(Request::active()->action, $noauth_list, true) && !Auth::check())
        // {
        //     Session::set_flash('error', 'You must be logged in.');
        //     Response::redirect('auth/login');
        // }

        $response = parent::before();

        return $response;        
    }
    // protected function check_auth($parent)
    // {
    //     $active = Request::active();
    //     if ($active->controller !== 'Controller_Welcome') {
    //         $noauth_list = ['login', 'logout'];
    //         if ( !in_array(Request::active()->action, $noauth_list, true) )
    //         {
    //             if (!Auth::check())
    //             {
    //                 Session::set_flash('error', 'You must be logged in.');
    //                 Response::redirect('auth/login');
    //             }
    //         }    
    //     }

    //     // if ( in_array(Request::active()->action, $noauth_list, true) && !Auth::check())
    //     // {
    //     //     Session::set_flash('error', 'You must be logged in.');
    //     //     Response::redirect('auth/login');
    //     // }

    // }
}
