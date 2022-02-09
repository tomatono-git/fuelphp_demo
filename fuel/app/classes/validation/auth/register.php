<?php

use Fuel\Core\Validation;

class Validation_Auth_Register
{
    public static function validate()
    {
		$val = Validation::forge('auth_register');
		$val->add_field('username', 'Username', 'required|max_length[50]');
		$val->add_field('password', 'Password', 'required|max_length[255]');
		// $val->add_field('group', 'Group', 'required|valid_string[numeric]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		// $val->add_field('last_login', 'Last Login', 'required|max_length[25]');
		// $val->add_field('login_hash', 'Login Hash', 'required|max_length[255]');
		// $val->add_field('profile_fields', 'Profile Fields', 'required');

		return $val;
    }
}