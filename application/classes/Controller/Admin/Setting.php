<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Admin_Setting extends Controller_Admin_Base{

    public function action_index()
    {
        $this->template_data['title'] = __('admin.settings.index.general');
    }

    public function action_edit()
    {
        $id = $this->request->param('id', null);

        if ( is_numeric($id) )
        {
            $option = Model_Option::find_by_id($id);
            if ( ! $option )
                throw new Exception_Base('common.option_not_found');
            $this->template_data['title'] = __('admin.settings.edit.modify_option');
        } else {
            $option = new Model_Option;
            $this->template_data['title'] = __('admin.settings.edit.new_option');
        }

        if ($this->request->is_post())
        {
            $post = $this->cleaned_post();
            $option->update($post);
            $option->save();
            $this->redirect('/admin/setting');
        }

        $this->template_data['option'] = $option;
    }

    public function action_defaults()
    {
        $this->template_data['title'] = __('admin.settings.index.defaults');
    }

    public function action_system(){}

    public function action_discuss(){}

}
