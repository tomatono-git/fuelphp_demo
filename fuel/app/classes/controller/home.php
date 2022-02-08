<?php

class Controller_Home extends Controller_Authenticated
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Home &raquo; Index';
		$this->template->content = View::forge('home/index', $data);
	}

}
