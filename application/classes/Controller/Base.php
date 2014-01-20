<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller
{
    protected $layout = 'layout';
    protected $view;
    protected $template_data = array();

    public function before()
    {
        $this->init();
    }
    /**
     * 初始化controller
     */
    protected function init()
    {
        $this->view = strtolower($this->request->controller()). '/'. $this->request->action();
    }
    /**
     * @param string $msg
     * @param string $page
     */
    public function error_page($msg = '', $page = 'error')
    {
        $this->view = "common/{$page}";
        $this->template_data['message'] = $msg;
    }

    /**
     * @param string $redirect
     *
     * @return Model_User|null
     */
    public function check_login($redirect = '')
    {
        $user = Auth::instance()->get_user();
        if ( $user ) {
            return $user;
        } else {
            $session = Session::instance();
            $session->set('return_url', $this->request->uri());
            $this->redirect('/login');
        }
    }

    /**
     * check current user is admin
     */
    public function check_admin()
    {
        $user = $this->check_login();
        if ( $user->is_admin() )
        {
            return $user;
        }
        $this->redirect('/');
    }

    /**
     * @param array $data
     */
    public function add_view_data($data)
    {
        $this->template_data = array_merge($this->template_data, $data);
    }

    public function after()
    {
        View::set_global('current_user', Auth::instance()->get_user());
        if ( ! $this->response->body())
        {
            $layout = View::factory($this->layout, $this->template_data);

            $body = View::factory($this->view, $this->template_data);
            $layout->bind('body', $body);
            $this->response->body($layout);
        }

        parent::after();
    }

    /**
     * 过滤无效的数据, '', 0
     *
     * @param       $data array
     * @param array $filters
     *
     * @return array
     */
    protected function clear_data($data, $filters = array('', NULL))
    {
        $ret = array();
        foreach($data as $key => $value)
        {
            if ( ! in_array($value, $filters) )
                $ret[$key] = $value;
        }

        return $ret;
    }

    protected function get_query($key, $default = NULL)
    {
        $value = $this->request->query($key);
        if ( !$value and $default )
        {
            $value = $default;
            // set to default value
            $this->request->query($key, $default);
        }
        return $value;
    }

    /**
     * 获取单个干净的POST数据
     *
     * @param string $key
     * @param        $value
     *
     * @return string|array
     */
    protected function get_post($key, $value=NULL)
    {
        $value = $this->get_raw_post($key, $value);

        return OJ::clean_data($value);
    }

    /**
     * 获取干净的POST数据集
     *
     * @return array
     */
    protected function cleaned_post()
    {
        return OJ::clean_data($this->request->post());
    }

    protected function get_raw_post($key, $default = NULL)
    {
        $value = $this->request->post($key);
        if ( !$value and $default )
        {
            $value = $default;
            // set to default value
            $this->request->post($key, $default);
        }
        return $value;
    }

    /**
     * 必须是post才能访问的助手函数
     */
    protected function need_post($url = NULL)
    {
        if ( $this->request->is_post() )
            return TRUE;
        if ( $url )
            $this->redirect($url);
        else
            return FALSE;
    }

} // End Welcome
