<?php /* @var Model_Topic $the_topic */?>
<ul class="breadcrumb">
    <li><a href="/discuss/">Discuss</a> <span class="divider">/</span></li>
    <li><a href="/discuss?pid=<?php echo($the_topic->pid);?>"><?php echo($the_topic->pid);?></a> <span class="divider">/</span></li>
    <li class="active"><?php echo($the_topic->title);?></li>
</ul>
<h2><?php echo($the_topic->title);?></h2>
by <a href="/u/<?php echo($the_topic->author_id);?>"><?php echo($the_topic->author_id);?></a>
<hr />
<?php foreach ($the_topic->replies() as $r): ?>
<div class="reply" id="reply-<?php echo($r->rid);?>">
    <div class="reply-header">
        <a href="/u/<?php echo($r->author_id);?>"><?php echo($r->author_id);?></a> reply at <?php echo(OJ::timesince($r->time));?>
    </div>
    <div class="reply-content">
        <?php echo($r->content);?>
    </div>
</div>
<?php endforeach;?>

<?php if (Auth::instance()->get_user()):?>
<form action="/discuss/topic/<?php echo($the_topic->topic_id);?>" method="POST" class="form-horizontal">
    <fieldset>
        <legend>add reply</legend>
            <textarea rows="8" id="content" name="content" cols="80" style="width: 500px"></textarea>
    </fieldset>
    <div class="form-actions">
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn">Cancel</button>
    </div>
</form>
<?php endif;?>