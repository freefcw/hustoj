<table class="table table-bordered">
    <thead>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Last Reply</th>
        <th>Reply Count</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($topic_list as $t): ?>
    <tr>
        <td>
            <a href="/problem/show/<?php echo $t['pid'];?>" style="color: #000000"> <?php echo $t['pid'];?> </a>

            <h3 style="display: inline-block"><a href="/t/<?php echo $t['topic_id'];?>"><?php echo $t['title'];?></a>
            </h3>
        </td>
        <td><a href="/user/<?php echo $t['user_id'];?>"><?php echo $t['user_id'];?></a></td>
        <td><?php echo OJ::mtime($t['last_reply']);?></td>
        <td><?php echo $t['reply_count'];?></td>
    </tr>
        <?php endforeach;?>
    </tbody>
</table>