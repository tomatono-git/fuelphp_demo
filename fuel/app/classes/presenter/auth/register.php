<?php

class Presenter_Auth_register extends Presenter
{
	public function view()
	{
        parent::view();

        $this->set_title('ログインユーザー登録');
        $view = $this->get_view();
        $view->set('subnav', ['register'=> 'active']);
	}
}
