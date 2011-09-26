<?php echo Form::open('/problem/status', array('method' => 'get', 'class'=>'filter'));?>
<?php echo Form::label('pid', 'Problem ID:');?>
<?php echo Form::input('pid');?>
<?php echo Form::label('uid', 'User ID:');?>
<?php echo Form::input('uid');?>
<?php echo Form::label('language', 'Language:');?>
<?php echo Form::select('language', array('-1' => 'All', '0'=>'C', '1'=>'C++', '2'=>'Pascal', '3'=>'Java', '4'=>'Ohters'), '-1'); ?>
<?php echo Form::label('result', 'Result:');?>
<?php echo Form::select('result', array("-1"=>"All", "4"=>"Accepted", "5"=>"Presentation Error", "6"=>"Wrong Answer",
	"7"=>"Time Limit Exceed", "8"=>"Memory Limit Exceed", "9"=>"Output Limit Exceed", "10"=>"Runtime Error", "11"=>"Compile Error", "0"=>"Pending", "1"=>"Pending Rejudging", "2"=>"Compiling", "3"=>"Running &amp; Judging"), '-1'); ?>
<?php echo Form::submit(NULL, 'Filter');?>
<?php echo Form::close();?>
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
<?php
	$append = '';
	$flag = TRUE;
	if ($pid != '')
	{
		if ($flag) $append = '?';
		$append = $append. "pid={$pid}";
		$flag = FALSE;
	}
	if ($uid != '')
	{
		if ($flag) $append = '?';
		$append = $append. "uid={$uid}";
		$flag = FALSE;
	}
	if ($language != -1)
	{
		if ($flag) $append = '?';
		$append = $append. "language={$language}";
		$flag = FALSE;
	}
	if ($result != -1)
	{
		if ($flag) $append = '?';
		$append = $append. "result={$result}";
		$flag = FALSE;
	}
?>
<?php echo html::anchor("/problem/status/{$page}/{$append}", 'Reflesh Page');?>
<?php echo html::anchor("/problem/status/{$append}", 'First Page');?>
<?php if ($page != 1): ?>
	<?php echo html::anchor(sprintf("/problem/status/%s/{$append}", $page-1), 'Prev Page');?>
<?php endif; ?>
<?php if ($page != $total): ?>
	<?php echo html::anchor(sprintf("/problem/status/%s/{$append}", $page+1), 'Next Page');?>
<?php endif; ?>
<?php echo html::anchor("/problem/status/{$total}/{$append}", 'Last Page');?>
</div>