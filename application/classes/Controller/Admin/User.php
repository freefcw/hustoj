<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_User extends Controller_Admin_Base{

    public function action_index()
    {
        $this->action_list();
    }

    public function action_list()
    {
        $this->view = 'admin/user/list';
    	$page = $this->request->param('id', 1);

    	$user_list = Model_User::find(array(), $page);

        $this->template_data['user_list'] = $user_list;
        $this->template_data['title']  = 'User List '. $page;
    }

    public function action_edit()
    {
        $user_id = $this->request->param('id', null);

        $user = Model_User::find_by_id($user_id);
        if ( !$user ) $this->redirect('/admin');

        if ( $this->request->is_post() )
        {
            $safe_data = $this->cleaned_post();

            if ($safe_data['password'] AND $safe_data['repassword'] == $safe_data['password'])
            {
                unset($safe_data['password']);
                $safe_data['password'] = Auth::instance()->hash($safe_data['password']);
            }
            $user->update($safe_data);
        }

        $this->template_data['user'] = $user;
        $this->template_data['title'] = 'Edit User '. $user_id;
    }

    public function action_del()
    {
        // ban it forever, just mark it
        $user_id = $this->request->param('id', null);

        $user = Model_User::find_by_id($user_id);
        $user->defunct = 1;

        //TODO: use ajax
        $this->action_index();
    }
}
