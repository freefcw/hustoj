<?php echo View::factory('contest/nav');?>

<h3><?php echo $title;?></h3>
Start at <?php echo $contest->start_time;?>
<br/>
End at <?php echo $contest->end_time;?>
<br/>
Current Time is <?php echo date('Y-m-d H:i:s');?>
<br/>Status: <?php echo OJ::is_private($contest->private);?>
<table class="zebra-striped">
	<thead>
		<tr><th>ID</th><th>Title</th></tr>
	</thead>
	<tbody>
<?php foreach($problems as $p): ?>
<tr>
<td><?php echo $p->pid;?></td>
<td><?php echo html::anchor("/contest/problem/{$p->pid}", $p->title);?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>