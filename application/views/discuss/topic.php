<div class="relies">
    <h1><?php echo $the_topic['title'];?></h1>
    <strong><a href="/user/<?php echo $the_topic['user_id'];?>"><?php echo $the_topic['user_id'];?></a></strong> post
    at <?php echo OJ::mtime($the_topic['date']);?>
    <div>
        <?php echo nl2br($the_topic['content']);?>
    </div>
    <?php foreach ($relies as $r): ?>
    <div class="reply" id="reply-<?php echo $r['reply_id'];?>">
        <a href="/user/<?php echo $r['user_id'];?>"><?php echo $r['user_id'];?></a>

        <p>
            <?php echo $r['content'];?>
        </p>
    </div>
    <?php endforeach;?>
</div>
