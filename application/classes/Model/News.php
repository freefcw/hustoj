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

    const TYPE_TOP    = 1; // 1 is top news
    const TYPE_NORMAL = 0; // 0 is normal

    public $news_id;
    public $user_id;
    public $title;
    public $content;
    public $time;
    public $importance; // 1 is top
    public $defunct;

    public static function number_of_public_news()
    {
        $filter = array(
            'defunct' => Model_News::DEFUNCT_NO
        );
        return self::count($filter);
    }

    public function is_top_news()
    {
        return self::TYPE_TOP == $this->importance;
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
        $filter = array(
            'importance' => self::TYPE_NORMAL,
            'defunct' => Model_News::DEFUNCT_NO
        );
        $news_list = Model_News::find($filter, $page, $limit, $orderby);
        return $news_list;
    }

    public static function top_news()
    {
        $orderby = array(
            'news_id' => self::ORDER_DESC,
        );
        $filter = array(
            'importance' => self::TYPE_TOP,
            'defunct' => Model_News::DEFUNCT_NO
        );
        $news_list = Model_News::find($filter, 1, 10, $orderby);
        return $news_list;
    }

    protected function initial_data()
    {
        $this->user_id = null;
        $this->defunct = self::DEFUNCT_NO;
        $this->time = e::format_time();
        $this->importance = self::TYPE_NORMAL;
    }

    public function validate()
    {}
}
