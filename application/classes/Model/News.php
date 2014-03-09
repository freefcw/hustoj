<?php

/**
 * Description of news
 *
 * @author freefcw
 */
class Model_News extends Model_Base {

    static $table = 'news';
    static $primary_key = 'news_id';

    static $cols = array(
        'news_id',
        'user_id',
        'title',
        'content',
        'time',
        'importance',
        'defunct',
    );

    const NEWS_TYPE_TOP    = 1;
    const NEWS_TYPE_NORMAL = 0;

    public $news_id;
    public $user_id;
    public $title;
    public $content;
    public $time;
    public $importance; // 1 is top
    public $defunct;

    public static function number_of_public_news()
    {
        $fileter = array(
            'defunct' => Model_News::DEFUNCT_NO
        );
        return self::count($fileter);
    }

    public function is_top_news()
    {
        return self::NEWS_TYPE_TOP == $this->importance;
    }

    public function is_public()
    {
        if ( $this->defunct == self::DEFUNCT_NO )
            return true;
        return false;
    }

    public static function fetch_public_news($page, $limit = 10)
    {
        $orderby = array(
            'news_id' => self::ORDER_DESC,
        );
        $fileter = array(
            'importance' => 0,
            'defunct' => Model_News::DEFUNCT_NO
        );
        $news_list = Model_News::find($fileter, $page, $limit, $orderby);
        return $news_list;
    }

    public static function top_news()
    {
        $orderby = array(
            'news_id' => self::ORDER_DESC,
        );
        $fileter = array(
            'importance' => 1,
            'defunct' => Model_News::DEFUNCT_NO
        );
        $news_list = Model_News::find($fileter, 1, 10, $orderby);
        return $news_list;
    }

    protected function initial_data()
    {
        $this->defunct = self::DEFUNCT_NO;
        $this->time = e::format_time();
        $this->importance = 0;
    }

    public function validate()
    {}
}
