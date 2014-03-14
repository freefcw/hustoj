<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Base
{

    public function action_index()
    {
        $page = $this->get_query('page', 1);

        $number_of_news = 10;

        if ( $page == 1 )
        {
            $top_news = Model_News::top_news();
            $number_of_news = $number_of_news - count($top_news);
        }
        $news_list = Model_News::fetch_public_news($page, $number_of_news);
        if ( isset($top_news) )
            $news_list = array_merge($top_news, $news_list);

        $total_news = Model_News::number_of_public_news();
        $this->template_data['total'] = ceil($total_news / $number_of_news);
        $this->template_data['title'] = e::get_website_name();
        $this->template_data['news_list'] = $news_list;
    }

    protected function fetch_news($page)
    {
        $key = 'news-page-'.$page;
        $cache = Cache::instance();
        $news_list = $cache->get($key);
        if ( ! $news_list )
        {
            $news_list = Model_News::fetch_public_news($page);
            $cache->set($key, $news_list, 60);
        }

        return $news_list;

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
            throw new Exception_Base(__('common.news_not_found'));
        }
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

    public function action_captcha()
    {
        Session::instance();

        $path = Kohana::find_file('vendor', 'cool-php-captcha-0.3.1/captcha');
        require_once $path;

        $captcha = new SimpleCaptcha();
        // OPTIONAL Change configuration...
        $captcha->wordsFile = 'words/en.php';
        $captcha->session_var = 'captcha';
        $captcha->imageFormat = 'png';
        $captcha->lineWidth = 3;
        //$captcha->scale = 3; $captcha->blur = true;
        $captcha->resourcesPath = APPPATH. "vendor/cool-php-captcha-0.3.1/resources";


        // OPTIONAL Simple autodetect language example
        /*
        if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $langs = array('en', 'es');
            $lang  = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            if (in_array($lang, $langs)) {
                $captcha->wordsFile = "words/$lang.php";
            }
        }
        */

        // Image generation
        ob_start();
        $captcha->CreateImage();
        $content = ob_get_contents();
        ob_end_clean();
        $this->response->headers('Content-type', 'image/png');
        $this->response->send_headers();
        $this->response->body($content);
    }

} // End Index
