<table class="table table-striped">
	<thead>
		<tr><th>ID</th><th>Title</th><th>Status</th><th>Private</th></tr>
	</thead>
	<tbody>
<?php foreach($list as $c): ?>
<tr>
<td><?php echo($c['contest_id']);?></td>
<td><?php e::anchor("/contest/show/{$c['contest_id']}", $c['title']);?></td>
<td><?php echo($c['end_time']);?></td>
<td><?php echo(OJ::private_value($c['private']));?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php echo(View::factory('common/pager', array('base_url' => '/contest', 'total' => $total)));?>