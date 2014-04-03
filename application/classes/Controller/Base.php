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
        I18n::setup();
    }
    /**
     * initialize controller
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
        $this->template_data['title'] = __('common.error');
        $this->flash_error($e->getMessage());
    }

    /**
     * @param string $redirect
     *
     * @return Model_User|null
     */
    public function check_login($redirect = e::LOGIN_URL)
    {
        $user = $this->get_current_user();
        if ( ! $user )
        {
            $session = Session::instance();
            $session->set('return_url', $this->request->uri());
            $this->redirect($redirect);
        }
        return $user;
    }

    /**
     * return current user or null
     *
     * @return Model_User|null
     */
    public function get_current_user()
    {
        $user = Auth::instance()->get_user();

        // check user is valid
        if ( $user and $user->is_defunct() )
        {
            Auth::instance()->logout();
            return $this->redirect(e::DISABLED_URL);
        }

        return $user;
    }

    public function go_home()
    {
        $this->redirect('/');
    }

    /**
     * check current user is admin
     */
    public function check_admin()
    {
        $user = $this->check_login();
        if ( ! $user->is_admin() )
        {
            $this->go_home();
        }
        return $user;
    }

    public function after()
    {
        View::set_global('current_user', $this->get_current_user());
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
     * filter data such as '', 0
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

    /**
     * get the query param in url
     *
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    protected function get_query($key, $default = NULL)
    {
        $value = $this->get_raw_query($key, $default);

        return OJ::clean_data($value);
    }

    protected function get_raw_query($key, $default = null)
    {
        $value = $this->request->query($key);
        if ( $value === null and $default )
        {
            $value = $default;
            // set to default value
            $this->request->query($key, $default);
        }
        return $value;
    }

    /**
     * get post data via key
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
     * record flashed message
     *
     * @param $message
     */
    protected function flash_info($message)
    {
        $this->flash_message('info', $message);
    }

    private function flash_message($type, $message)
    {
        $sess = Session::instance();
        $messages = $sess->get($type, array());
        if ( is_array($message) )
        {
            $messages = array_merge($messages, $message);
        } else {
            array_push($messages, $message);
        }
        $sess->set($type, $messages);
    }

    protected function flash_error($message)
    {
        $this->flash_message('error', $message);
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
        if ( $value === null and $default )
        {
            $value = $default;
            // set to default value
            $this->request->post($key, $default);
        }
        return $value;
    }

    /**
     * the method is helper for make sure request is post
     *
     * @param string $url will redirect to the url, if null will redirect to the default home page
     *
     */
    protected function need_post($url = NULL)
    {
        if ( $this->request->is_post() )
            return;

        if ( is_null($url) )
            $this->go_home();
        else
            $this->redirect($url);
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
            } catch (Exception_Page $e) {
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
     * if action is not exist then call method, subclass should implement it when use it.
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
