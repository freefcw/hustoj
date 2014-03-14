<?php /* @var Model_Topic $the_topic */
?>
<ul class="breadcrumb">
    <li><a href="<?php e::url('/discuss/');?>"><?php echo(__('discuss.list.discuss')); ?></a> <span class="divider"></span></li>
    <?php if ( $the_topic->cid ):?>
    <li><a href="<?php e::url("/contest/talk?cid={$the_topic->cid}");?>"><?php echo(__('discuss.list.contest')); ?> <?php echo($the_topic->cid);?></a> <span class="divider"></span></li>
    <?php else:?>
    <li><a href="<?php e::url("/discuss?pid={$the_topic->pid}");?>"><?php echo($the_topic->pid);?></a> <span class="divider"></span></li>
    <?php endif;?>
    <li class="active"><?php echo($the_topic->title);?></li>
</ul>
<div class="topic">
<h2><?php echo($the_topic->title);?></h2>
<?php if ( OJ::is_admin() ):?>
<div class="admin-op">
    <a class="btn btn-danger make-sure" href="<?php e::url("/discuss/removetopic/{$the_topic->tid}");?>" data-no-turbolink><?php echo(__('discuss.list.delete')); ?></a>
    <?php if ( ! $the_topic->author()->is_disabled() ):?>
    <a class="btn btn-warning make-sure" href="<?php e::url("user/disable/{$the_topic->author_id}");?>" data-no-turbolink><?php echo(__('discuss.list.block_:user', array(':user' => $the_topic->author_id)));?></a>
    <?php else: ?>
    <span class="label label-info"><?php echo(__('discuss.list.blocked')); ?></span>
    <?php endif;?>
</div>
<?php endif;?>

<?php foreach ($the_topic->replies() as $r): ?>
<div class="reply" id="reply-<?php echo($r->rid);?>">
    <div class="reply-header">
        <a href="<?php e::url("/u/{$r->author_id}");?>"><?php echo($r->author_id);?></a> <?php echo(__('discuss.show.reply_:time_before', array(':time' => e::timesince($r->time))));?>
    <?php if ( OJ::is_admin() ):?> <a data-no-turbolink class="btn btn-warning" href="<?php e::url("/discuss/removereply/{$r->rid}");?>"><?php echo(__('discuss.show.delete_reply')); ?></a> <?php endif;?>
    </div>
    <div class="reply-content well"><?php echo(HTML::chars($r->content));?></div>
</div>
<?php endforeach;?>
<?php if (Auth::instance()->get_user()):?>
<form class="add-reply form" action="<?php e::url("/discuss/topic/{$the_topic->tid}");?>" method="POST">
    <fieldset>
        <legend><?php echo(__('discuss.show.reply')); ?></legend>
        <div class="form-group">
            <div>
                <textarea class="form-control" rows="8" id="content" name="content" cols="80"></textarea>
            </div>
        </div>
    </fieldset>
    <div class="form-group">
    <button type="submit" class="btn btn-primary"><?php echo(__('discuss.show.reply')); ?></button>
    </div>
</form>
<?php endif;?>
</div>
