<?php /* @var Model_Topic $the_topic */?>
<ul class="breadcrumb">
    <li><a href="/discuss/">Discuss</a> <span class="divider"></span></li>
    <?php if ( $the_topic->cid ):?>
    <li><a href="/contest/talk?cid=<?php echo($the_topic->cid);?>">Contest <?php echo($the_topic->cid);?></a> <span class="divider"></span></li>
    <?php else:?>
    <li><a href="/discuss?pid=<?php echo($the_topic->pid);?>"><?php echo($the_topic->pid);?></a> <span class="divider"></span></li>
    <?php endif;?>
    <li class="active"><?php echo($the_topic->title);?></li>
</ul>
<div class="topic">
<h2><?php echo($the_topic->title);?></h2>
<?php if ( OJ::current_is_admin() ):?>
<div class="admin-op">
    <a class="btn btn-danger make-sure" href="/discuss/removetopic/<?php echo $the_topic->tid;?>">DELETE TOPIC</a>
    <?php if ( ! $the_topic->author()->is_disabled() ):?>
    <a class="btn btn-warning make-sure" href="/user/disable/<?php echo $the_topic->author_id;?>">DISABLE <?php echo($the_topic->author_id);?></a>
    <?php else: ?>
    <span class="label label-info">BLOCKED</span>
    <?php endif;?>
</div>
<?php endif;?>

<?php foreach ($the_topic->replies() as $r): ?>
<div class="reply" id="reply-<?php echo($r->rid);?>">
    <div class="reply-header">
        <a href="/u/<?php echo($r->author_id);?>"><?php echo($r->author_id);?></a> reply at <?php echo(OJ::timesince($r->time));?>
    <?php if ( OJ::current_is_admin() ):?> <a class="btn btn-warning" href="/discuss/removereply/<?php echo($r->rid);?>">DELETE reply</a> <?php endif;?>
    </div>
    <div class="reply-content well"><?php echo($r->content);?></div>
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