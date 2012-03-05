<table class="table table-striped">
	<thead>
		<tr><th>ID</th><th>Title</th><th>Status</th><th>Private</th></tr>
	</thead>
	<tbody>
<?php foreach($contest_list as $c):?>
<tr>
<td><?php echo $c['contest_id'];?><a class="edit-link" href="/admin/contest/edit/<?php echo $c['contest_id'];?>" style="float:right;">[EDIT]</a></td>
<td><?php echo html::anchor("/contest/show/{$c['contest_id']}", $c['title']);?></td>
<td><?php echo OJ::mtime($c['end_time']);?> -- <?php echo OJ::mtime($c['end_time']);?></td>
<td class="capitalize"><a href="/admin/contest/changeprivate/<?php echo OJ::is_private($c['private']);?>"><?php echo OJ::is_private($c['private']);?></a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>