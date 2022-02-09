<?php

// use Fuel\Core\View;

// class Presenter_Users_view extends Presenter
class Presenter_Users_view extends Presenter_Template
{
	public function view()
	{
        parent::view();

        $this->set_title('User - view');

		// // $this->content = "Users &raquo; view";

		// $this->template->title = "User - view";
		// $this->template->content = $this->get_view();
		// // $this->template->content = View::forge('users/view', $data);
	}
}