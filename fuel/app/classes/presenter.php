<?php

use Fuel\Core\View;
abstract class Presenter extends Fuel\Core\Presenter
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
    public function set_template(View $template)
    {
        $this->template = $template;
    }

    public function set_title(string $title)
    {
		$this->template->title = $title;
    }

    public function view()
	{
		$this->template->content = $this->get_view();
	}
}
