<table class="table table-striped">
	<thead>
		<tr><th>Rank</th><th>User ID</th><th>Nick</th><th>Solved</th><th>Submit</th><th>Ratio</th></tr>
	</thead>
	<tbody>
<?php $rank = ($page - 1) * $per_page; /* @var Model_User[] $users */ ?>
<?php foreach($users as $u):?>
<?php $rank = $rank + 1;?>
    <tr>
        <td class="rank"><?php echo($rank) ?></td>
        <td><?php echo html::anchor("/u/{$u['user_id']}", $u['user_id']); ?></td>
        <td><?php echo HTML::chars($u['nick']); ?></td>
        <td><?php echo($u->solved); ?></td>
        <td><?php echo($u->submit); ?></td>
        <td><?php echo($u->ratio_of_accept()) ?></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
<!--<div class="pagination" style="width: 500px;margin-left: auto;margin-right: auto;">-->
<ul class="pager rank-pager">
    <li><?php echo html::anchor("/rank/user", 'First');?></li>
<?php if ($page != 1): ?>
	<li><?php echo html::anchor(sprintf('/rank/user/%s', $page-1), 'Previous');?></li>
<?php endif; ?>
    <li class="reflesh"><?php echo html::anchor("/rank/user/{$page}", 'Reflesh');?></li>
<?php if ($page != $total_page): ?>
	<li><?php echo html::anchor(sprintf('/rank/user/%s', $page+1), 'Next');?></li>
<?php endif; ?>
    <li><?php echo html::anchor(sprintf('/rank/user/%s', $total_page), 'Last');?></li>
</ul>