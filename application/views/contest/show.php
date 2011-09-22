<table>
<?php foreach($problems as $p): ?>
<tr>
<td><?php echo $p->pid;?></td>
<td><?php echo $p->title;?></td>
</tr>
<?php endforeach;?>
</table>