<?php defined('SYSPATH') or die('No direct script access.');
/**
 * User: freefcw
 * Date: 12-2-16
 * Time: 上午11:04
 */

class Controller_Admin_Problem extends Controller_Admin_Base {

    public function action_index()
    {
        $this->action_list();
    }

    public function action_edit($p_id = null)
    {
        if ($p_id !== null)
        {
            // come from action_new
            $pid = $p_id;
        } else {
            $pid = $this->request->param('id', null);
        }

        if (($pid === null) or (! is_numeric($pid))) $this->error_page();

        $m = new Model_Problem();

        $pid = intval($pid);

        if ($this->request->method() == 'POST')
        {
            $post = $this->request->post();

            $newdata = array();

            $newdata['problem_id'] = $pid;
            $newdata['title'] = $post['title'];
            $newdata['time_limit'] = $post['time_limit'];
            $newdata['memory_limit'] = $post['memory_limit'];
            $newdata['description'] = $post['description'];
            $newdata['input'] = $post['input'];
            $newdata['output'] = $post['output'];
            $newdata['sample_input'] = $post['sample_input'];
            $newdata['sample_output'] = $post['sample_output'];
            $newdata['hint'] = $post['hint'];
            $newdata['source'] = $post['source'];

            $newdata['spj'] = false;
            if (array_key_exists('spj', $post))
                $newdata['spj'] = true;

            $m->save($newdata);
        }
        $problem = $m->find_by_id($pid);

        // view begin
        $body = View::factory('admin/problem/edit');
        $body->bind('problem', $problem);

        $this->view->title = 'Edit '. $problem['problem_id']. ' -- '. $problem['title'];
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

    public function action_search()
    {
        $text = $this->request->query('term', null);
        if ($text === null) $this->error_page();

        $m = new Model_Problem();
        $result = $m->find_problem($text, 'title');

        $json = array();
        foreach($result as $item)
        {
            $tmp = array(
                'id' => sprintf('%s', $item['_id']),
                'title' => $item['title'],
            );
            $json[] = $tmp;
        }

        $this->view = json_encode($json);
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

        $filter = array();
        $problem_list = Model_Problem::find($filter, $page);

        $body = View::factory('admin/problem/list');
        $body->bind('problem', $problem_list);

        // list problem
        $this->view->title = 'Problem List';
        $this->view->body = $body;
    }
}
