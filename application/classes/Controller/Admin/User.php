<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_User extends Controller_Admin_Base{

    public function action_index()
    {
        $this->view = 'admin/user/list';
        $this->action_list();
    }

    public function action_list()
    {
        $page = $this->get_query('page', 1);

    	$user_list = Model_User::find(array(), $page);

        $this->template_data['total'] = Model_User::count();
        $this->template_data['user_list'] = $user_list;
        $this->template_data['title']  = __('admin.user.list.user_list');
    }

    public function action_edit()
    {
        $user_id = $this->request->param('id', null);

        $user = Model_User::find_by_id($user_id);
        if ( !$user )
            throw new Exception_Page(__('common.user_not_found'));

        if ( $this->request->is_post() )
        {
            $safe_data = $this->cleaned_post();

            $password = $safe_data['password'];
            if ($password AND $safe_data['repassword'] == $password )
            {
                $user->update_password($password);
            }
            // strip password
            unset($safe_data['password']);
            unset($safe_data['repassword']);

            $user->set_permission($this->get_post('permission'));
            $user->update($safe_data);
            $user->save();
        }

        $this->template_data['user'] = $user;
        $this->template_data['title'] =
            __('admin.user.edit.edit_:user',
                array(':user' => $user_id));
    }

    public function action_del()
    {
        // ban it forever, just mark it
        $user_id = $this->request->param('id', null);

        $user = Model_User::find_by_id($user_id);
        $user->defunct = Model_User::DEFUNCT_YES;
        $user->save();

        //TODO: use ajax
        $this->action_index();
    }
}
