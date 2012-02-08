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