<?php

use Fuel\Core\Input;

class Presenter_Auth_login extends Presenter
{
	public function view()
	{
        parent::view();

        $this->set_title('ログイン');
        $view = $this->get_view();
        $view->set('subnav', ['login'=> 'active']);
        $view->set('username', Input::post('username'));
	}
}
