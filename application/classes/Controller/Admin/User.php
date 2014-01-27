<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_User extends Controller_Admin_Base{

    public function action_index()
    {
        $this->action_list();
    }

    public function action_list()
    {
        $this->view = 'admin/user/list';
        $page = $this->get_query('page', 1);

    	$user_list = Model_User::find(array(), $page);

        $this->template_data['total'] = Model_User::count();
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

            $password = $safe_data['password'];
            if ($password AND $safe_data['repassword'] == $password )
            {
                unset($safe_data['password']);
                $safe_data['password'] = Auth::instance()->hash($password);
            }
            $user->update($safe_data);
            $user->save();
        }

        $this->template_data['user'] = $user;
        $this->template_data['title'] = 'Edit User '. $user_id;
    }

    public function action_del()
    {
        // ban it forever, just mark it
        $user_id = $this->request->param('id', null);

        $user = Model_User::find_by_id($user_id);
        $user->defunct = Model_User::DEFUNCT_YES;

        //TODO: use ajax
        $this->action_index();
    }
}
