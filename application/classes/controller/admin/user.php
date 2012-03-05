<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_User extends Controller_Admin_My{

    public function action_index()
    {
        $this->action_list();
    }

    public function action_list()
    {
    	$page = $this->request->param('id', 1);

    	$m = new Model_User();
    	$user_list = $m->get_list($page);

        $body = View::factory('admin/user/list');
        $body->bind('user_list', $user_list);

        $this->view->title = 'User List '. $page;
        $this->view->body = $body;
    }

    public function action_edit()
    {
        $user_id = $this->request->param('id', null);
        if ($user_id === null) $this->error_page();
        $m = new Model_User();
        if ($this->request->method() == 'POST')
        {
            $post = $this->request->post();

            $newdata = array(
                'disable'=> false,
            );
            $newdata['user_id'] = $post['user_id'];
            $user_id = $post['user_id'];
            $newdata['school'] = $post['school'];
            $newdata['intro'] = $post['intro'];
            $newdata['email'] = $post['email'];

            if ($post['disabled'] == 1)
                $newdata['disabled'] = true;

            if ($post['password'] AND $post['repassword'] == $post['password'])
            {
                $newdata['password'] = Auth::instance()->hash($post['password']);
            }

            $ret = $m->update_information($newdata);
        }
        $u = $m->get_info_by_name($user_id);

        $body = View::factory('/admin/user/edit');
        $body->bind('user', $u);

        $this->view->title = 'Edit '. $user_id;
        $this->view->body = $body;
    }

    public function action_del()
    {
        // ban it forever, just mark it
        $user_id = $this->request->param('id', null);
        if ($user_id === null) $this->error_page();

        $user = new Model_User();
        $user->ban($user_id);

        //TODO: use ajax
        $this->action_index();
    }
}
