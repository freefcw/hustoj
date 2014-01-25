<?php
/**
 * @author: freefcw
 * Date: 1/22/14
 * Time: 11:46 PM
 */

class Controller_Admin_News extends Controller_Admin_Base {

    public function action_index()
    {
        $page = $this->get_query('page', 1);
        $news_list = Model_News::find(array(), $page);

        $this->template_data['title'] = 'Mews List '.$page;
        $this->template_data['news_list'] = $news_list;
    }

    public function action_add()
    {
        $this->view = 'admin/news/edit';
        $news = new Model_News;

        $this->template_data['title'] = 'add News';
        $this->template_data['news'] = $news;
    }

    public function action_edit()
    {
        $id = $this->request->param('id', null);

        if ( $id )
        {
            $news = Model_News::find_by_id($id);
            if ( ! $news )
            {
                $this->error_page('not found this page');
            }
            $this->template_data['title'] = 'Edit - '.$news->title;

        } else {
            $news = new Model_News;
            $news->user_id = $this->current_user->user_id;
        }

        if ( $this->request->is_post() )
        {
            $post = $this->cleaned_post();
            if ( isset($post['defunct']) )
            {
                $post['defunct'] = 'Y';
            } else {
                $post['defunct'] = 'N';
            }
            var_dump($post);
            $news->update($post);
            if ( $news->save() )
            {
                $this->redirect('/admin/news');
            } else {
                $this->template_data['message'] = array('save failed');
            }
        }
        $this->template_data['news'] = $news;
    }
}