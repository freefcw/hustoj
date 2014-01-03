<?php defined('SYSPATH') or die('No direct script access.');
/**
 * User: freefcw
 * Date: 12-2-16
 * Time: 上午11:04
 */

class Controller_Admin_Problem extends Controller_Admin_Base {

    public function action_index()
    {
        $this->view = 'admin/problem/list';
        $this->action_list();
    }

    public function action_edit()
    {
        $pid = $this->request->param('id', null);

        if ( $pid )
        {
            $problem = Model_Problem::find_by_id($pid);
        } else {
            $problem = new Model_Problem;
        }

        if ( $this->request->is_post() )
        {
            $post = $this->cleaned_post();
            $problem->update($post);

            $problem->spj = 0;
            if (array_key_exists('spj', $post))
                $problem->spj = 1;
            $problem->save();
        }
        $this->template_data['problem'] = $problem;
        $this->template_data['title'] = 'Edit '. $problem['problem_id']. ' -- '. $problem['title'];
    }

    public function action_save()
    {
        if ( $this->request->is_post() )
        {
            $safe_data = $this->cleaned_post();
            $problem = new Model_Problem;
            $problem->update($safe_data);
            $problem->save();
            $this->action_edit($problem->problem_id);
        }
        $this->redirect('/admin/');
    }

    public function action_defunct()
    {
        $pid = $this->get_query('problem_id');

        if ($pid)
        {
            $problem = Model_Problem::find_by_id($pid);
            if ( $problem->defunct == Model_Base::DEFUNCT_NO )
            {
                $problem->defunct = Model_Base::DEFUNCT_YES;
                $data = Model_Base::DEFUNCT_YES;
            } else {
                $problem->defunct = Model_Base::DEFUNCT_NO;
                $data = Model_Base::DEFUNCT_NO;
            }
            $problem->save();
            $ret = new JPackage();
            $ret->result = $data;
            $this->response->body($ret->tojson());
        } else {
            $ret = new JPackage();
            $ret->code = 0;
            $ret->message = 'Not Found';
            $this->response->body($ret->tojson());
        }
    }

    public function action_search()
    {
        $text = $this->request->query('term', null);
        if ( $text == null)
        {
            $this->response->body('');
            return;
        }

        $result = Model_Problem::search($text, 'title');

        $json = array();
        foreach($result as $item)
        {
            $tmp = array(
                'id' => $item->problem_id,
                'title' => $item['title'],
            );
            $json[] = $tmp;
        }

        $this->response->body(json_encode($json));
    }

    public function action_new()
    {
        $this->view = 'admin/problem/edit';
        $problem = new Model_Problem;
        $this->template_data['problem'] = $problem;
        $this->template_data['title'] = 'New Problem';
    }

    public function action_list()
    {
        $page = $this->request->param('id', 1);

        $filter = array();
        $problem_list = Model_Problem::find($filter, $page);

        $this->template_data['pages'] = ceil(intval(Model_Problem::count($filter)) / OJ::per_page);
        $this->template_data['problem_list'] = $problem_list;
        $this->template_data['title'] = 'Problem List';
    }
}
