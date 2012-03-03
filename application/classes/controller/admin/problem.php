<?php defined('SYSPATH') or die('No direct script access.');
/**
 * User: freefcw
 * Date: 12-2-16
 * Time: 上午11:04
 */

class Controller_Admin_Problem extends Controller_Admin_My {

    public function action_index()
    {
        $this->action_list();
    }

    public function action_edit($p_id)
    {
        if (isset($p_id))
        {
            // come from action_new
            $pid = $p_id;
        } else {
            $pid = $this->request->param('id', null);
        }

        if (($pid === null) or (! is_numeric($pid))) $this->error_page();

        $m = new Model_Problem();
        $problem = $m->get_problem(intval($pid));

        // view begin
        $body = View::factory('admin/problem/edit');
        $body->bind('problem', $problem);

        $this->view->title = 'Edit '. $problem['id']. ' -- '. $problem['title'];
        $this->view->body = $body;
    }

    public function action_save()
    {
        if ($this->request->method() != 'GET') $this->error_page();

        $post = $this->request->post();

        $m = new Model_Problem();
        $pid = $m->save($post);

        $this->action_edit($pid);
    }

    public function action_delete()
    {
        // TODO: add as a ajax request
        //
        // delete a problem
        $pid = $this->request->param('id', null);
        if (($pid === null) or (! is_numeric($pid)))
        {
            $this->error_page();
        }
        $m = new Model_Problem();
        $m->delete(intval($pid));

        $this->action_list();
    }

    public function action_new()
    {
        // new problem
        $body = View::factory('admin/problem/edit');

        $this->view->title = 'Add new Problem';
        $this->view->body = $body;
    }

    public function action_list()
    {
        $page = $this->request->param('id', 1);

        $m = new Model_Problem();
        $problem_list = $m->get_page_for_admin($page);

        $body = View::factory('admin/problem/list');
        $body->bind('problem', $problem_list);

        // list problem
        $this->view->title = 'Problem List';
        $this->view->body = $body;
    }
}
