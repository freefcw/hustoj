<ul class="breadcrumb">
    <li><a href="/discuss/">Discuss</a> <span class="divider">/</span></li>
    <li><a href="/discuss?pid=<?php echo $the_topic['pid'];?>"><?php echo $the_topic['pid'];?></a> <span class="divider">/</span></li>
</ul>
<h2><?php echo $the_topic['title'];?></h2>
<a href="/user/<?php echo $the_topic['user_id'];?>"><?php echo $the_topic['user_id'];?></a>
 post at <?php echo OJ::mtime($the_topic['date']);?>
<div class="readability">
    <?php echo nl2br($the_topic['content']);?>
</div>
<hr />

<?php foreach ($relies as $r): ?>
<div class="reply" id="reply-<?php echo $r['reply_id'];?>">
    <a href="/user/<?php echo $r['user_id'];?>"><?php echo $r['user_id'];?></a> reply at <?php echo OJ::timesince($r['date']);?>
    <p>
        <?php echo $r['content'];?>
    </p>
</div>
<?php endforeach;?>

<?php if (Auth::instance()->get_user()):?>
<form action="/discuss/topic/<?php echo $the_topic['topic_id'];?>" method="POST" class="form-horizontal">
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