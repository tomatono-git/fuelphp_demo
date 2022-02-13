<?php

use Fuel\Core\View;

abstract class Controller_Template extends Fuel\Core\Controller
{
	// /**
	// * @var string page template
	// */
	// public $template = 'template';
	/**
	* @var View page template
	*/
	public $template = 'template';

    use Controller_Trait_Auth;
    
	/**
	 * Load the template and create the $this->template object
	 */
	public function before()
	{
		if ( ! empty($this->template) and is_string($this->template))
		{
			// Load the template
			$this->template = View::forge('template');
		}

        return $this->check_auth();
	}

	/**
	 * After controller method has run output the template
	 *
	 * @param  Response  $response
	 */
	public function after($response)
	{
		// If nothing was returned default to the template
		if ($response === null)
		{
			$response = $this->template;
		}

		return parent::after($response);
	}

	/**
	 * Factory for fetching the Presenter
	 *
	 * @param   string  $presenter    Presenter classname without View_ prefix or full classname
	 * @param   string  $method       Method to execute
	 * @param   bool    $auto_filter  Auto filter the view data
	 * @param   string  $view         View to associate with this presenter
	 * @return  Presenter
	 */
	public function forge($presenter, $method = 'view', $auto_filter = null, $view = null)
    {
		$presenter = Presenter::forge($presenter, $method, $auto_filter, $view);
		$presenter->set_template($this->template);
        return $presenter;
    }
}
