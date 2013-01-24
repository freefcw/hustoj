<div class="relies">
    <?php foreach ($relies as $r): ?>
    <div class="reply" id="reply-<?php echo $r['reply_id'];?>">
        <a href="/user/<?php echo $r['user_id'];?>"><?php echo $r['user_id'];?></a>

        <p>
            <?php echo $r['content'];?>
        </p>
    </div>
    <?php endforeach;?>
</div>
