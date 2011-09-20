<table>
<?php $rank = $pages * $per_page; ?>
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
</table>