<?php

use Fuel\Core\View;

class Presenter_Home_index extends Presenter
{
    public function view()
    {
        parent::view();

        $this->set_title('Home - Index');
        $this->set([
            'subnav' => ['index'=> 'active'],
        ]);
    }
}
