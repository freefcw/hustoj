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
    
    protected function initial_data()
    {

    }

    public function validate()
    {}
}
