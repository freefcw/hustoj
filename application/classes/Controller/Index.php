<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Base
{

    public function action_index()
    {
        $template_data = array(
            'title' => 'Home',
            'rss' => array(),
        );

//        $cache = Cache::instance();
//        $rss = $cache->get('bitbucket-rss', null);
//        if ($rss === null) {
//            //$data = file_get_contents('https://bitbucket.org/freefcw/hustoj/rss');
//            //$rss = Feed::parse($data);
//            $rss = array(
//                array('title' => '1000', 'link' => '/problem/show/1000'),
//                array('title' => '1001', 'link' => '/problem/show/1001')
//            );
//            $cache->set('bitbucket-rss', $rss, 300);
//        }


        $this->add_view_data($template_data);
    }

    public function action_home()
    {
        $this->action_index();
    }

    public function action_faqs()
    {
        $this->template_data['title'] = 'FAQS';
    }

    public function action_status()
    {
        //TODO: add visible
        //TODO: 1. add total problems
        //TODO: 2. add total users
        //TODO: 3. add total submission status, total, tle, ac, re, etc.
        //TODO: 4. server status, system load, network...
        //TODO:
        $this->template_data['title'] = 'HUST OJ STATUS';
    }

    public function action_about()
    {
        $this->template_data['title'] = "About HUST OJ";
    }

    public function action_links()
    {
        $this->template_data['title'] = "Friends Link";
    }

    public function action_contact()
    {
        $this->template_data['title'] = "Contact US";
    }

    public function action_help()
    {
        $this->template_data['title'] = 'FAQS';
    }

    public function action_terms()
    {
        $this->template_data['title'] = 'TERMS';
    }

    public function action_news()
    {
        $id = $this->request->param('id');

        $news = Model_News::find_by_id($id);
        if ( $news AND $news->is_public() )
        {
            $this->template_data['title'] = $news->title;
            $this->template_data['news'] = $news;
        } else {
            // [TODO: add more handle]
            $this->redirect('/');
        }
    }

} // End Index
