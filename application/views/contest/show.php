<h3 class="page-title"><?php echo $title;?></h3>
<div class="content-info">
From <span class="label success"><?php echo $contest->start_time;?></span> To <span class="label important"><?php echo $contest->end_time;?></span> Now is <span class="label warning"><?php echo date('Y-m-d H:i:s');?></span> Status: <span class="label notice"><?php echo OJ::is_private($contest->private);?></span>
</div>
<?php echo View::factory('contest/nav');?>
<table class="zebra-striped">
	<thead>
		<tr><th>ID</th><th>Title</th></tr>
	</thead>
	<tbody>
<?php foreach($problems as $p): ?>
<tr>
<td><?php echo $p->pid;?></td>
<td><?php echo html::anchor("/contest/{$cid}/problem/{$p->num}", $p->title);?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>