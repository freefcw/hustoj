<form action="/discuss" method="get" class="form-search pull-left">
    <input type="text" class="input-small icon-search" placeholder="problem id" name="pid">
    <input type="text" class="input-small icon-search" placeholder="user id" name="uid">
    <button type="submit" class="btn">Filter</button>
</form>
<a href="/discuss/new" class="btn btn-info pull-right">New Topic</a>

<hr style="clear: both"/>
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

            <a href="/t/<?php echo $t['topic_id'];?>"><strong><?php echo $t['title'];?></strong></a>
        </td>
        <td><a href="/user/<?php echo $t['user_id'];?>"><?php echo $t['user_id'];?></a></td>
        <td><?php echo OJ::mtime($t['last_reply']);?></td>
        <td><?php echo $t['reply_count'];?></td>
    </tr>
        <?php endforeach;?>
    </tbody>
</table>