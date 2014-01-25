<div class="welcome readability">
    <h3>Welcome to HUSTOJ</h3>
    <p>Any problem, please see the contact information in contact page</p>
</div>
<div class="row index">
    <div class="news">
        <?php /* @var Model_News[] $news_list */foreach($news_list as $news):?>
        <div class="news-item">
            <h4><a href="/news/<?php echo($news->news_id);?>"><?php echo($news->title);?></a></h4>
            <div class="meta"><span class="author"><?php echo($news->user_id);?></span> @ <span class="date"><?php echo($news->time);?></span></div>
            <div class="news-content readability">
                <?php echo(mb_substr($news->content, 0, 200));?>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
