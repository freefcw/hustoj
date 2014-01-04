<?php /* @var Model_Topic $the_topic */?>
<ul class="breadcrumb">
    <li><a href="/discuss/">Discuss</a> <span class="divider"></span></li>
    <li><a href="/discuss?pid=<?php echo($the_topic->pid);?>"><?php echo($the_topic->pid);?></a> <span class="divider"></span></li>
    <li class="active"><?php echo($the_topic->title);?></li>
</ul>
<div class="topic">
<h2><?php echo($the_topic->title);?></h2>
<div class="more">by <a href="/u/<?php echo($the_topic->author_id);?>"><?php echo($the_topic->author_id);?></a>
</div>
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
<form action="/discuss/topic/<?php echo($the_topic->tid);?>" method="POST" class="form">
    <fieldset>
        <legend>add reply</legend>
        <div class="form-group">
            <div>
                <textarea class="form-control" rows="8" id="content" name="content" cols="80" style="width: 500px"></textarea>
            </div>
        </div>
    </fieldset>
    <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn">Cancel</button>
    </div>
</form>
<?php endif;?>
</div>