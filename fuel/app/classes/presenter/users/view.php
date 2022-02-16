<?php

// use Fuel\Core\View;

class Presenter_Users_view extends Presenter
{
    public function view()
    {
        parent::view();

        $this->set_title('User - view');
    }
}