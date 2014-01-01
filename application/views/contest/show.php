<?php /* @var Model_Contest $contest */?>
<?php echo(View::factory('contest/nav', array('title' => $title, 'cid' => $cid, 'contest' => $contest)));?>
<table class="table table-striped">
	<thead>
		<tr><th>ID</th><th>Title</th></tr>
	</thead>
	<tbody>
<?php
foreach($contest->problem() as $p):
    $problem = $p->detail();
?>
<tr>
<td><?php echo($p->display_order());?></td>
<td><?php echo(html::anchor("/contest/{$cid}/problem/{$p['num']}", $problem->title));?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>