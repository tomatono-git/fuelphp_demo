<?php

use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\View;
use Fuel\Core\Input;

class Controller_Users extends Controller_Authenticated
{

	public function action_index()
	{
		$data['users'] = Model_User::find('all');
		$this->template->title = "Users";
		$this->template->content = View::forge('users/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('users');

		$user = Model_User::find($id);
		// if ( ! $data['user'] = Model_User::find($id))
		if (!$user)
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('users');
		}

		$data['user'] = $user;
		$this->template->title = "User";
		$this->template->content = View::forge('users/view', $data);

		// $viewName = 'users/view';
		// $view = View_Twig::forge($viewName);
		// $presenter = Presenter::Forge('users/view', [
		// 	'user', $user
		// ]);
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

			if ($val->run())
			{
				$user = Model_User::forge(array(
					'username' => Input::post('username'),
					'password' => Input::post('password'),
					'group' => Input::post('group'),
					'email' => Input::post('email'),
					'last_login' => Input::post('last_login'),
					'login_hash' => Input::post('login_hash'),
					'profile_fields' => Input::post('profile_fields'),
				));

				if ($user and $user->save())
				{
					Session::set_flash('success', 'Added user #'.$user->id.'.');

					Response::redirect('users');
				}

				else
				{
					Session::set_flash('error', 'Could not save user.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('users/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('users');

		if ( ! $user = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('users');
		}

		$val = Model_User::validate('edit');

		if ($val->run())
		{
			$user->username = Input::post('username');
			$user->password = Input::post('password');
			$user->group = Input::post('group');
			$user->email = Input::post('email');
			$user->last_login = Input::post('last_login');
			$user->login_hash = Input::post('login_hash');
			$user->profile_fields = Input::post('profile_fields');

			if ($user->save())
			{
				Session::set_flash('success', 'Updated user #' . $id);

				Response::redirect('users');
			}

			else
			{
				Session::set_flash('error', 'Could not update user #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user->username = $val->validated('username');
				$user->password = $val->validated('password');
				$user->group = $val->validated('group');
				$user->email = $val->validated('email');
				$user->last_login = $val->validated('last_login');
				$user->login_hash = $val->validated('login_hash');
				$user->profile_fields = $val->validated('profile_fields');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('users/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('users');

		if ($user = Model_User::find($id))
		{
			$user->delete();

			Session::set_flash('success', 'Deleted user #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete user #'.$id);
		}

		Response::redirect('users');

	}

}
