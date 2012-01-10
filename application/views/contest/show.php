<h3 class="page-title"><?php echo $title;?></h3>
<div class="content-info">
From <span class="label success"><?php echo OJ::mtime($contest['start_time']);?></span> To <span class="label important"><?php echo OJ::mtime($contest['end_time']);?></span> Now is <span class="label warning"><?php echo date('Y-m-d H:i:s');?></span> Status: <span class="label notice"><?php echo OJ::is_private($contest['private']);?></span>
</div>
<?php echo View::factory('contest/nav');?>
<?php if(isset($contest['plist'])):?>
<table class="zebra-striped">
	<thead>
		<tr><th>ID</th><th>Title</th></tr>
	</thead>
	<tbody>
<?php $p_num = 0;?>
<?php foreach($contest['plist'] as $p): ?>
<tr>
<td><?php echo OJ::contest_pid($p_num);?></td>
<td><?php echo html::anchor("/contest/{$cid}/problem/{$p_num}", $p['title']);?></td>
</tr>
<?php $p_num++;?>
<?php endforeach;?>
</tbody>
</table>
<?php endif;?>