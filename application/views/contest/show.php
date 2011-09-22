<?php echo View::factory('contest/nav');?>
<table>
<?php foreach($problems as $p): ?>
<tr>
<td><?php echo $p->pid;?></td>
<td><?php echo html::anchor("/contest/problem/{$p->pid}", $p->title);?></td>
</tr>
<?php endforeach;?>
</table>