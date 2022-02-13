<?php

use Fuel\Core\View;
// use Fuel\Core\Format;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\Input;

class Controller_Todos extends Controller_Template
{

	public function action_index()
	{
		$data['todos'] = Model_Todo::find('all');
		$this->template->title = "Todos";
		$this->template->content = View::forge('todos/index', $data);

	}

	public function action_download()
	{
		$todos = Model_Todo::find('all');
		$json = Format::forge($todos)->to_json();
		$csv = Format::forge($json, 'json')->to_csv();

		$this->template = null;
		$this->response = new Response();
		$this->response->set_header('Content-Type', 'application/csv');
		$this->response->set_header('Content-Disposition', 'attachment; filename="download.csv"');
		$this->response->send(true);
		echo $csv;

		return;		
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('todos');

		if ( ! $data['todo'] = Model_Todo::find($id))
		{
			Session::set_flash('error', 'Could not find todo #'.$id);
			Response::redirect('todos');
		}

		$this->template->title = "Todo";
		$this->template->content = View::forge('todos/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Todo::validate('create');

			if ($val->run())
			{
				$user_id = $this->get_login_user_id();
				$todo = Model_Todo::forge(array(
					'title' => Input::post('title'),
					'comment' => Input::post('comment'),
					'state' => Input::post('state'),
					'due_date' => Input::post('due_date'),
					'due_time' => Input::post('due_time'),
					'created_user' => $user_id,
					'updated_user' => $user_id,
				));

				if ($todo and $todo->save())
				{
					Session::set_flash('success', 'Added todo #'.$todo->id.'.');

					Response::redirect('todos');
				}

				else
				{
					Session::set_flash('error', 'Could not save todo.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Todos";
		$this->template->content = View::forge('todos/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('todos');

		if ( ! $todo = Model_Todo::find($id))
		{
			Session::set_flash('error', 'Could not find todo #'.$id);
			Response::redirect('todos');
		}

		$val = Model_Todo::validate('edit');

		if ($val->run())
		{
			$todo->title = Input::post('title');
			$todo->comment = Input::post('comment');
			$todo->state = Input::post('state');
			$todo->due_date = Input::post('due_date');
			$todo->due_time = Input::post('due_time');
			$todo->updated_user = $this->get_login_user_id();

			if ($todo->save())
			{
				Session::set_flash('success', 'Updated todo #' . $id);

				Response::redirect('todos');
			}

			else
			{
				Session::set_flash('error', 'Could not update todo #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$todo->title = $val->validated('title');
				$todo->comment = $val->validated('comment');
				$todo->state = $val->validated('state');
				$todo->due_date = $val->validated('due_date');
				$todo->due_time = $val->validated('due_time');
				$todo->updated_user = $this->get_login_user_id();

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('todo', $todo, false);
		}

		$this->template->title = "Todos";
		$this->template->content = View::forge('todos/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('todos');

		if ($todo = Model_Todo::find($id))
		{
			$todo->delete();

			Session::set_flash('success', 'Deleted todo #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete todo #'.$id);
		}

		Response::redirect('todos');

	}

}
