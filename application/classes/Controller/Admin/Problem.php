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

    public function action_edit($pid = null)
    {
        if ( ! $pid )
            $pid = $this->request->param('id', null);

        if ( $pid )
        {
            $problem = Model_Problem::find_by_id($pid);
            if ( ! $problem )
                throw new Exception_Page(__('common.problem_not_found'));
        } else {
            $problem = new Model_Problem;
        }


        if ( $this->request->is_post() )
        {
            $post = $this->cleaned_post();
            $problem->update($post);

            $problem->spj = Model_Problem::JUDGE_NORMAL;
            if (array_key_exists('spj', $post))
                $problem->spj = Model_Problem::JUDGE_SPECIAL;
            $problem->save();
        }
        $this->template_data['title'] = 
            __('admin.problem.edit.edit_:id_:name',
                array(':id' => $problem['problem_id'],
                      ':name' => $problem['title']));
        $this->template_data['problem'] = $problem;
    }

    public function action_defunct()
    {
        $pid = $this->get_query('problem_id');

        $problem = Model_Problem::find_by_id($pid);

        $ret = new JPackage();
        $ret->code = 0;

        if ( $problem )
        {
            if ( $problem->defunct == Model_Base::DEFUNCT_NO )
            {
                $problem->defunct = Model_Base::DEFUNCT_YES;
            } else {
                $problem->defunct = Model_Base::DEFUNCT_NO;
            }
            $problem->save();
            $ret->result = $problem->defunct;

        } else {
            $ret->message = __('common.problem_not_found');
        }

        $this->response->body($ret->tojson());
    }

    public function action_search()
    {
        $text = trim($this->get_query('term', ''));

        $json = array();
        if ( $text )
        {
            $order_by = array(
                'problem_id' => Model_Base::ORDER_DESC
            );

            $result = Model_Problem::search($text, 'title', $order_by, $show_all=true);

            foreach($result as $item)
            {
                $tmp = array(
                    'id' => $item->problem_id,
                    'title' => $item['title'],
                );
                array_push($json, $tmp);
            }
        }
        $this->response->body(json_encode($json));
    }

    public function action_new()
    {
        $this->view = 'admin/problem/edit';
        $problem = new Model_Problem;
        $this->template_data['problem'] = $problem;
        $this->template_data['title'] = __('admin.problem.edit.new_problem');
    }

    public function action_upload()
    {
        $problem = Model_Problem::find_by_id($this->request->param('id'));

        $ret = 'upload failed, filetype is .in or .out ?';
        if ( $problem and $this->request->is_post() )
        {
            $data_path = $problem->data_dir();
            if ( isset($_FILES['Filedata']) )
            {
                $file = $_FILES['Filedata'];
                if ( Upload::not_empty($file) and Upload::type($file, array('in', 'out')))
                {
                    if ( !file_exists($data_path) )
                    {
                        mkdir($data_path, 0777, true);
                    }
                    if ( $f = Upload::save($file, $file['name'], $data_path) )
                    {
                        $ret = 'OK';
                    }
                }
            } else {
                return $this->redirect('admin');
            }
        }
        $this->response->body($ret);
    }

    public function action_showdata()
    {
        $problem = Model_Problem::find_by_id($this->request->param('id'));
        $filename = $this->request->param('filename');
        $ext = $this->request->param('ext');
        if ( $problem )
        {
            $data_path = $problem->data_dir();
            $path = $data_path. '/'. $filename. '.'. $ext;
            if( file_exists($path) and is_file($path) )
            {
                $content = file_get_contents($path);
            } else {
                $content = 'File no found';
            }
        }
        $this->response->headers('Content-Type', 'text/plain');
        $this->response->body($content);
    }

    public function action_deldata()
    {
        $problem = Model_Problem::find_by_id($this->request->param('id'));
        $filename = $this->request->param('filename');
        $ext = $this->request->param('ext');
        if ( $problem )
        {
            $data_path = $problem->data_dir();
            $path = $data_path. '/'. $filename. '.'. $ext;
            if( file_exists($path) and is_file($path) )
            {
                unlink($path);
            }
        }
        return $this->redirect($this->request->referrer());
    }
    public function action_list()
    {
        $page = $this->request->param('id', 1);

        $filter = array();
        $orderby = array(
            Model_Problem::$primary_key => Model_Base::ORDER_ASC
        );
        $problem_list = Model_Problem::find($filter, $page, OJ::per_page, $orderby);

        $this->template_data['pages'] = ceil(intval(Model_Problem::count($filter)) / OJ::per_page);
        $this->template_data['problem_list'] = $problem_list;
        $this->template_data['title'] = __('admin.problem.list.problem_list');
    }
}
