<h3><?php echo($news->title);?></h3>
<div class="news-meta">
    <span class="author"><?php echo($news->user_id);?></span> @ <span class="date"><?php echo($news->time);?></span>
</div>
<div class="news-content readability">
    <?php echo($news->content);?>
</div>