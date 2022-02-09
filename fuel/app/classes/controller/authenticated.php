<?php

use Fuel\Core\Controller_Template;

/**
 * Auth Controller.
 *
 * @package  app
 * @extends  Controller
 */
abstract class Controller_Authenticated extends Controller_Template
{
    use Controller_Trait_Auth;
    
    public function before()
    {
        return $this->check_auth();
        // $active = Request::active();
        // if ($active->controller !== 'Controller_Welcome') {
        //     $noauth_list = ['login', 'logout'];
        //     if ( !in_array(Request::active()->action, $noauth_list, true) )
        //     {
        //         if (!Auth::check())
        //         {
        //             Session::set_flash('error', 'You must be logged in.');
        //             Response::redirect('auth/login');
        //         }
        //     }    
        // }
        // // if ( in_array(Request::active()->action, $noauth_list, true) && !Auth::check())
        // // {
        // //     Session::set_flash('error', 'You must be logged in.');
        // //     Response::redirect('auth/login');
        // // }

        // $response = parent::before();

        // return $response;
    }

}