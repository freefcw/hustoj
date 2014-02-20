<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Admin_Setting extends Controller_Admin_Base{

    public function action_index()
    {
        $this->template_data['title'] = 'General Setting';
    }

    public function action_edit()
    {
        $id = $this->request->param('id');
        if ( $id )
        {
            $option = Model_Option::find_by_id($id);
            $this->template_data['title'] = 'Modify Option';
            if ( ! $option )
                return $this->error_page('option not found');
        } else {
            $option = new Model_Option;
            $this->template_data['title'] = 'Add Option';
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

    public function action_system(){}

    public function action_discuss(){}

}