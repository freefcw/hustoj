<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller
{
    protected $layout = 'layout';
    protected $view;
    protected $template_data = array();

    public function before()
    {
        if ( $this->request->headers('x-xhr-referer') )
        {
            $referer = $this->request->headers('x-xhr-referer');
            $this->request->referrer($referer);
            $this->response->headers('X-XHR-Current-Location', $this->request->uri());
        }
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
     * @param Exception_Base $e
     *
     * @throws Exception_Base
     * @return $this
     */
    public function error_page($e)
    {
        $this->view = $e->getTemplate();
        $this->template_data['title'] = 'Error !!';
        $this->template_data['message'] = $e->getMessage();
    }

    /**
     * @param string $redirect
     *
     * @return Model_User|null
     */
    public function check_login($redirect = '')
    {
        $user = Auth::instance()->get_user();
        if ( ! $user )
        {
            $session = Session::instance();
            $session->set('return_url', $this->request->uri());
            $this->redirect('/login');
        }
        return $user;
    }

    /**
     * check current user is admin
     */
    public function check_admin()
    {
        $user = $this->check_login();
        if ( ! $user->is_admin() )
        {
            $this->redirect('/');
        }
        return $user;
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
     * record flashed message
     *
     * @param $message
     */
    protected function flash_message($message)
    {
        $sess = Session::instance();
        $messages = $sess->get('flashed_message', array());
        array_push($messages, $message);
        $sess->set('flashed_message', $messages);
    }

    /**
     * all post data
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


    public function execute()
    {
        // Execute the "before action" method
        $this->before();

        // Determine the action to use
        $action = 'action_'.$this->request->action();

        // If the action doesn't exist, it's a 404
        if ( ! method_exists($this, $action))
        {
            $this->missing_action();
        } else {
            // Execute the action itself
            try {
                $this->{$action}();
            } catch (Exception_Base $e) {
                $this->error_page($e);
            }
        }

        // Execute the "after action" method
        $this->after();

        // Return the response
        return $this->response;
    }

    /**
     *
     * 不存在action的时候会自动调用这个，subcontroller could replace with self action..
     *
     * @throws Kohana_HTTP_Exception
     * @return null|mixed
     */
    public function missing_action()
    {
        throw HTTP_Exception::factory(404,
                                      'The requested URL :uri was not found on this server.',
                                      array(':uri' => $this->request->uri())
        )->request($this->request);
    }
} // End Welcome
