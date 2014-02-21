<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Index extends Controller_Admin_Base
{

    public function action_index()
    {
        $this->template_data['title'] = 'Admin Control Dashboard';
    }

    public function action_rejudge()
    {
        if ( $this->request->is_post() ) {
            $type = $this->get_post('type');
            $id = intval($this->get_post('typeid'));

            if ($type == 'PROBLEM') {
                $problem = Model_Problem::find_by_id($id);
                if ( $problem )
                {
                    $problem->rejudge();
                    $message = sprintf('The solution of problem %d is rejudging', $problem->problem_id);
                    $this->flash_message($message);
                }
            } else if ($type == 'SOLUTION') {
                $solution = Model_Solution::find_by_id($id);
                if ( $solution )
                {
                    $solution->rejudge();
                    $message = sprintf('Solution %d is rejudging', $solution->solution_id);
                    $this->flash_message($message);
                }
            }
        }
        $this->redirect('/admin/');
    }

}