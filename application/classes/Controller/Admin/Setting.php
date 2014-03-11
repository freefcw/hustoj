<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Admin_Setting extends Controller_Admin_Base{

    public function action_index()
    {
        $this->template_data['title'] = 'General Setting';
    }

    public function action_edit()
    {
        $id = $this->request->param('id', null);
        if ( is_numeric($id) )
        {
            $option = Model_Option::find_by_id($id);
            if ( ! $option )
                throw new Exception_Base('option not found');
            $this->template_data['title'] = 'Modify Option';
        } else {
            $option = new Model_Option;
            $value = Model_Option::get_option($id);
            if ( $value )
            {
                $option->name = $id;
                $option->value = $value->value;
            }
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

    public function action_defaults()
    {
        $this->template_data['title'] = 'Defaults Setting';
    }

    public function action_system(){}

    public function action_discuss(){}

}