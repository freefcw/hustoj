<table>
    <thead>
    <tr>
        <th>Problem ID</th>
        <th>Content ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Date</th>
        <th>Last Reply</th>
        <th>Reply Count</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($topic_list as $t): ?>
    <tr>
        <td><?php if ($t['pid'] != 0) {
            echo $t['pid'];
        }?></td>
        <td><?php echo $t['cid'];?></td>
        <td><a href="/t/<?php echo $t['topic_id'];?>"><?php echo $t['title'];?></a></td>
        <td><?php echo $t['user_id'];?></td>
    </tr>
        <?php endforeach;?>
    </tbody>
</table>