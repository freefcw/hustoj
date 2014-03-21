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
        $limit = $this->get_query('limit', 50);

        $orderby = array(
            'news_id' => 'DESC',
        );
        $news_list = Model_News::find(array(), $page, $limit, $orderby);

        $this->template_data['title'] = __('admin.news.index.news_list');
        $this->template_data['news_list'] = $news_list;
    }

    public function action_add()
    {
        $this->view = 'admin/news/edit';
        $news = new Model_News;

        $this->template_data['title'] = __('admin.news.edit.new_news');
        $this->template_data['news'] = $news;
    }

    public function action_edit()
    {
        $id = $this->request->param('id', null);

        if ( $id )
        {
            $news = Model_News::find_by_id($id);
        } else {
            $news = new Model_News;
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
            if ( isset($post['top']) )
            {
                $news->importance = Model_News::NEWS_TYPE_TOP;
            } else {
                $news->importance = Model_News::NEWS_TYPE_NORMAL;
            }
            $news->user_id = $this->current_user->user_id;

            $news->update($post);
            $news->content = $this->get_raw_post('content');

            if ( $news->save() )
            {
                $this->redirect('/admin/news');
            } else {
                $this->flash_error(__('common.error'));
            }
        }

        $this->template_data['title'] = 
            __('admin.news.edit.edit_news_:name',
                array(':name' => $news->title));
        $this->template_data['news'] = $news;
    }
}
