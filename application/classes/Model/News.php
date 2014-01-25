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

    public $news_id;
    public $user_id;
    public $title;
    public $content;
    public $time;
    public $importance;
    public $defunct;


    public function is_public()
    {
        if ( $this->defunct == self::DEFUNCT_NO )
            return true;
        return false;
    }

    public static function fetch_public_news($page, $limit = 10)
    {
        $orderby = array(
            'news_id' => 'DESC',
        );
        $fileter = array(
            'defunct' => Model_News::DEFUNCT_NO
        );
        $news_list = Model_News::find($fileter, $page, $limit, $orderby);
        return $news_list;
    }

    protected function initial_data()
    {
        $this->defunct = self::DEFUNCT_NO;
        $this->time = OJ::format_time();
        $this->importance = 0;
    }

    public function validate()
    {}
}
