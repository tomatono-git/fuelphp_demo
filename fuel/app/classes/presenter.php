<?php

use Fuel\Core\View;
use Parser\View_twig;

/**
 * テンプレート対応の Presenter
 */
abstract class Presenter extends Fuel\Core\Presenter
{
    /**
     * @var View テンプレートのView
     */
    protected $template;

    /**
     * テンプレートのViewを取得
     * 
     * @return View page template
     */
    public function get_template()
    {
        return $this->template;
    }

    /**
     * テンプレートのViewを設定
     *
     * @param View $template
     */
    public function set_template(View $template)
    {
        $this->template = $template;
    }

    /**
     * 画面タイトルを設定
     *
     * @param string $title 画面タイトル
     * @return void
     */
    public function set_title(string $title)
    {
        $this->template->title = $title;
        $this->set('views_dir', APPPATH.'views/');
    }

    /**
     * view
     *
     * @return void
     */
    public function view()
    {
        // コンテンツにViewを設定
        $this->template->content = $this->get_view();
    }

    // /**
    //  * $this->get_view()->set(・・・) のショートカット
    //  *
	//  * @param  string|array $key     変数名または変数名の配列
	//  * @param  mixed        $value   値
	//  * @param  bool         $filter  データをフィルタリングするかどうか
    //  * @return View
    //  */
    // public function view_set($key, $value = null, $filter = null)
    // {
    //     return $this->get_view()->set($key, $value, $filter);
    // }

    /**
     * Factory for fetching the Presenter
     *
     * @param   string  $presenter    Presenter classname without View_ prefix or full classname
     * @param   string  $method       Method to execute
     * @param   bool    $auto_filter  Auto filter the view data
     * @param   string  $view         View to associate with this presenter
     * @return  Presenter Presenter (このクラス)
     */
    public static function forge($presenter, $method = 'view', $auto_filter = null, $view = null)
    {
        $twig = View_twig::forge($view ?? $presenter);
        return parent::forge($presenter, $method, $auto_filter, $twig);
    }
}
