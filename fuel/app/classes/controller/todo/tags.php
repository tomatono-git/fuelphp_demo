<?php
class Controller_Todo_Tags extends Controller_Template
{

	public function action_index()
	{
		$data['todo_tags'] = Model_Todo_Tag::find('all');
		$this->template->title = "Todo_tags";
		$this->template->content = View::forge('todo/tags/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('todo/tags');

		if ( ! $data['todo_tag'] = Model_Todo_Tag::find($id))
		{
			Session::set_flash('error', 'Could not find todo_tag #'.$id);
			Response::redirect('todo/tags');
		}

		$this->template->title = "Todo_tag";
		$this->template->content = View::forge('todo/tags/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Todo_Tag::validate('create');

			if ($val->run())
			{
				$todo_tag = Model_Todo_Tag::forge(array(
					'tag' => Input::post('tag'),
					'created_user' => Input::post('created_user'),
					'updated_user' => Input::post('updated_user'),
				));

				if ($todo_tag and $todo_tag->save())
				{
					Session::set_flash('success', 'Added todo_tag #'.$todo_tag->id.'.');

					Response::redirect('todo/tags');
				}

				else
				{
					Session::set_flash('error', 'Could not save todo_tag.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Todo_Tags";
		$this->template->content = View::forge('todo/tags/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('todo/tags');

		if ( ! $todo_tag = Model_Todo_Tag::find($id))
		{
			Session::set_flash('error', 'Could not find todo_tag #'.$id);
			Response::redirect('todo/tags');
		}

		$val = Model_Todo_Tag::validate('edit');

		if ($val->run())
		{
			$todo_tag->tag = Input::post('tag');
			$todo_tag->created_user = Input::post('created_user');
			$todo_tag->updated_user = Input::post('updated_user');

			if ($todo_tag->save())
			{
				Session::set_flash('success', 'Updated todo_tag #' . $id);

				Response::redirect('todo/tags');
			}

			else
			{
				Session::set_flash('error', 'Could not update todo_tag #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$todo_tag->tag = $val->validated('tag');
				$todo_tag->created_user = $val->validated('created_user');
				$todo_tag->updated_user = $val->validated('updated_user');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('todo_tag', $todo_tag, false);
		}

		$this->template->title = "Todo_tags";
		$this->template->content = View::forge('todo/tags/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('todo/tags');

		if ($todo_tag = Model_Todo_Tag::find($id))
		{
			$todo_tag->delete();

			Session::set_flash('success', 'Deleted todo_tag #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete todo_tag #'.$id);
		}

		Response::redirect('todo/tags');

	}

}
