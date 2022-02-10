<?php
class Controller_Todos extends Controller_Template
{

	public function action_index()
	{
		$data['todos'] = Model_Todo::find('all');
		$this->template->title = "Todos";
		$this->template->content = View::forge('todos/index', $data);

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
				$todo = Model_Todo::forge(array(
					'title' => Input::post('title'),
					'comment' => Input::post('comment'),
					'state' => Input::post('state'),
					'created_user' => Input::post('created_user'),
					'updated_user' => Input::post('updated_user'),
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
			$todo->created_user = Input::post('created_user');
			$todo->updated_user = Input::post('updated_user');

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
				$todo->created_user = $val->validated('created_user');
				$todo->updated_user = $val->validated('updated_user');

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
