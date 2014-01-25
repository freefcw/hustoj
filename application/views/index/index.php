<div class="welcome readability">
    <h3>Welcome to HUSTOJ</h3>
    <p>Any problem, please see the contact information in contact page</p>
</div>
<div class="row index">
    <div class="news">
        <?php /* @var Model_News[] $news_list */foreach($news_list as $news):?>
        <div class="news-item">
            <h4><a href="/news/<?php echo($news->news_id);?>"><?php echo($news->title);?></a></h4>
            <div class="news-content">
                <?php echo($news->content);?>
            </div>
        </div>
        <?php endforeach;?>
    </div>

</div>
