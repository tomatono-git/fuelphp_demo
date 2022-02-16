<?php

use Fuel\Core\Input;

class Presenter_Auth_login extends Presenter
{
    public function view()
    {
        parent::view();

        $this->set_title('ログイン');
        $this->set([
            'subnav', ['login'=> 'active'],
            'username' => Input::post('username'),
        ]);
    }
}
