<table>
	<thead>
		<tr><th>Run ID</th><th>User ID</th><th>Problem</th><th>Result</th><th>Time</th><th>Memory</th><th>Language</th><th>Code Length</th><th>Submit Time</th></tr>
	</thead>
	<tbody>
<?php foreach($list as $i): ?>
<tr>
<td><?php echo $i->solution_id;?></td>
<td><?php echo html::anchor("/problem/show/{$i->problem_id}", $i->problem_id);?></td>
<td><?php echo html::anchor("/user/{$i->user_id}", $i->user_id);?></td>
<td><?php echo $i->result;?></td>
<td><?php echo $i->time;?>ms</td>
<td><?php echo $i->memory;?>kb</td>
<td><?php echo $i->language;?></td>
<td><?php echo $i->code_length;?></td>
<td><?php echo $i->in_date;?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<div class="fn-nav">
<?php echo html::anchor("/problem/status/{$page}", 'Reflesh Page');?>
<?php echo html::anchor("/problem/status", 'First Page');?>
<?php if ($page != 1): ?>
	<?php echo html::anchor(sprintf('/problem/status/%s', $page-1), 'Prev Page');?>
<?php endif; ?>
<?php if ($page != $total): ?>
	<?php echo html::anchor(sprintf('/problem/status/%s', $page+1), 'Next Page');?>
<?php endif; ?>
<?php echo html::anchor("/problem/status/{$total}", 'Last Page');?>
</div>