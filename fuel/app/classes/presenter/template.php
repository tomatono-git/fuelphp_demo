<?php

abstract class Presenter_Template extends Fuel\Core\Presenter
{
    /**
	 * @var Fuel\Core\View テンプレートのView
	 */
	protected $template;

    /**
     * テンプレートのViewを取得
     * 
	 * @return Fuel\Core\View page template
	 */
    public function get_template()
    {
        return $this->template;
    }

    /**
     * テンプレートのViewを設定
     *
     * @param Fuel\Core\View $template
     */
    public function set_template($template)
    {
        $this->template = $template;
    }
}
