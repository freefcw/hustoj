<?php
/**
 * Description of news
 *
 * @author freefcw
 */
class News_Model extends Model_Database {
    public function  __construct() {
        parent::__construct();
    }

    public function create($data)
    {
        
    }
    /**
        *  delete a news
        *
        * @param <int> $news_id
        * @return <boolean>
        */
    public function delete($news_id)
    {
        $this->db->delete($news_id);
    }
    /**
        * get news
        *
        * @access public
        * @return <array>
        */
    public function getNews($limit, $page = 0)
    {
        $key = "news-{$limit}-{$page}";
        $cache = Cache::instance();
        $data = $cache->get($key);
        if($data != null) return $data;

        $this->db->select('*')
                ->from('news')
                ->where('n_published', '1')
                ->limit($limit)
                ->offset($page)
                ->orderby('n_date', 'DESC');

        $result = $this->db->get()->as_array();
        $cache->set($key, $result, array('news', 'page'));
        return $result;
    }
}
?>
