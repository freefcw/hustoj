<table class="table table-striped">
	<thead>
		<tr><th>ID</th><th>Title</th><th>Status</th><th>Private</th></tr>
	</thead>
	<tbody>
<?php foreach($contest_list as $c):?>
<tr>
<td><?php echo $c['contest_id'];?><a class="edit-link" href="/admin/contest/edit/<?php echo $c['contest_id'];?>" style="float:right;">[EDIT]</a></td>
<td><?php echo html::anchor("/contest/show/{$c['contest_id']}", $c['title']);?></td>
<td><?php echo($c['start_time']);?> <br/> <?php echo($c['end_time']);?></td>
<td class="capitalize"><a href="/admin/contest/changeprivate/<?php echo OJ::private_value($c['private']);?>"><?php echo OJ::private_value($c['private']);?></a>
    <?php if (OJ::is_private($c['private'])):?>| <a href="/admin/contest/listuser/<?php echo $c['contest_id'];?>">Edit Member</a><?php endif;?>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>