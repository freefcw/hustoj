<?php if (Request::$current->query('page') == 1):?>
<div class="welcome readability">
    <h3><?php echo(__("index.welcome_to_:name", array(':name' => e::get_website_name()))); ?></h3>
    <p><?php echo(__("index.any_problem")); ?></p>
</div>
<?php endif;?>
<div class="row index">
    <div class="news">
        <?php /* @var Model_News[] $news_list */foreach($news_list as $news):?>
        <div class="news-item">
            <h4><a href="<?php e::url("/news/{$news->news_id}");?>"><?php echo($news->title);?></a><?php if ($news->is_top_news()):?><span class="label label-danger">top</span><?php endif;?></h4>
            <div class="news-content readability">
                <?php if ( mb_strlen($news->content) > 150 ):?>
                <?php echo(mb_substr($news->content, 0, 100));?><a href="<?php e::url("/news/{$news->news_id}");?>" class="readmore">...</a>
                <?php else:?>
                <?php echo($news->content);?>
                <?php endif;?>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<?php echo(View::factory('block/pager', array('base_url' => '', 'total' => $total)));?>
