<table>
	<thead>
		<tr><th>Rank</th><th>User ID</th><th>Nick</th><th>Solved</th><th>Submit</th><th>Ratio</th></tr>
	</thead>
	<tbody>
<?php $rank = ($page - 1) * $per_page; ?>
<?php foreach($users as $u):?>
<?php $rank = $rank + 1; ?>
<tr>
<td class="rank"><?php echo $rank; ?></td>
<td><?php echo html::anchor("/user/{$u->user_id}", $u->user_id); ?></td>
<td><?php echo HTML::chars($u->nick); ?></td>
<td><?php echo $u->solved; ?></td>
<td><?php echo $u->submit; ?></td>
<td><?php if($u->solved == 0):?>
0.00%
<?php else: ?>
<?php echo sprintf( "%.02lf%%", $u->solved/$u->submit * 100); ?>
<?php endif; ?>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<div class="fn-nav">
<?php echo html::anchor("/rank/user/{$page}", 'Reflesh Page');?>
<?php echo html::anchor("/problem/status", 'First Page');?>
<?php if ($page != 1): ?>
	<?php echo html::anchor(sprintf('/rank/user/%s', $page-1), 'Prev Page');?>
<?php endif; ?>
<?php if ($page != $total_page): ?>
	<?php echo html::anchor(sprintf('/rank/user/%s', $page+1), 'Next Page');?>
<?php endif; ?>
<?php echo html::anchor(sprintf('/rank/user/%s', $total_page), 'Last Page');?>
</div>