<?php

class Controller_Home extends Controller_Template
{

    public function get_index()
    {
        $presenter = $this->forge('home/index');
        $presenter->view();
        // return $this->forge('home/index');
    }
}

