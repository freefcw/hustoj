<table>
<?php foreach($list as $c):?>
<tr>
<td><?php echo $c->contest_id;?></td>
<td><?php echo $c->title;?></td>
<td><?php echo $c->end_time;?></td>
<td><?php echo $c->private;?></td>
</tr>
<?php endforeach; ?>
</table>