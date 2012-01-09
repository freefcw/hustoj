<?php echo Form::open('/problem/status', array('method' => 'get', 'class' => 'inline-inputs', 'style' => 'width: 800px; margin-left: auto;margin-right: auto;'));?>
<span>Problem ID: </span><?php echo Form::input('pid', '', array('class' => 'small'));?>
<span> User ID:</span><?php echo Form::input('uid', '', array('class' => 'small'));?>
<span> Language:</span><?php echo Form::select('language', array('-1' => 'All', '0'=>'C', '1'=>'C++', '2'=>'Pascal', '3'=>'Java', '4'=>'Ohters'), '-1', array('class' => 'span2')); ?>
<span> Result:</span><?php echo Form::select('result', array("-1"=>"All", "4"=>"Accepted", "5"=>"Presentation Error", "6"=>"Wrong Answer",
	"7"=>"Time Limit Exceed", "8"=>"Memory Limit Exceed", "9"=>"Output Limit Exceed", "10"=>"Runtime Error", "11"=>"Compile Error", "0"=>"Pending", "1"=>"Pending Rejudging", "2"=>"Compiling", "3"=>"Running &amp; Judging"), '-1', array('class' => 'span3')); ?>
 <?php echo Form::submit(NULL, 'Filter', array('class' => 'btn'));?>
<?php echo Form::close();?>
<table class="zebra-striped">
	<thead>
		<tr><th>Run ID</th><th>Problem</th><th>User ID</th><th>Result</th><th>Time</th><th>Memory</th><th>Language</th><th>Code Length</th><th>Submit Time</th></tr>
	</thead>
	<tbody>
<?php foreach($list as $i): ?>
<tr>
<td><?php echo $i['solution_id'];?></td>
<td><?php echo html::anchor("/problem/show/{$i['problem_id']}", $i['problem_id']);?></td>
<td><?php echo html::anchor("/user/{$i['user_id']}", $i['user_id']);?></td>
<td><?php echo OJ::jresult($i['result']);?></td>
<td><?php if($i['result'] == 4) echo $i['time'], 'ms'; else echo '-----'?></td>
<td><?php if($i['result'] == 4) echo $i['memory'], 'kb'; else echo '-----'?></td>
<td><?php echo OJ::lang($i['language']);?></td>
<td><?php echo $i['code_length'];?>B</td>
<td><?php echo OJ::mtime($i['add_date']);?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<div class="pagination" style="width: 480px;margin-left: auto;margin-right: auto">
    <ul>
<?php
	$append = '';
	$flag = TRUE;
    if (!is_null($pid))
	{
		if ($flag) $append = '?';
		$append = $append. "pid={$pid}";
		$flag = FALSE;
	}
	if (!is_null($uid))
	{
		if ($flag) $append = '?';
		$append = $append. "uid={$uid}";
		$flag = FALSE;
	}
	if (!is_null($language))
	{
		if ($flag) $append = '?';
		$append = $append. "language={$language}";
		$flag = FALSE;
	}
	if (!is_null($result))
	{
		if ($flag) $append = '?';
		$append = $append. "result={$result}";
		$flag = FALSE;
	}
    if (!is_null($cid))
    {
        if ($flag) $append = '?';
        $append = $append. "cid={$cid}";
        $flag = FALSE;
    }
?>
<li><?php echo html::anchor("/problem/status/{$page}/{$append}", 'Reflesh Page');?></li>
<li><?php echo html::anchor("/problem/status/{$append}", 'First Page');?></li>
<li>
<?php if ($page != 1): ?>
	<?php echo html::anchor(sprintf("/problem/status/%s/{$append}", $page-1), 'Prev Page');?>
<?php endif; ?>
<?php if ($page != $total): ?>
	<?php echo html::anchor(sprintf("/problem/status/%s/{$append}", $page+1), 'Next Page');?>
<?php endif; ?>
</li>
<li><?php echo html::anchor("/problem/status/{$total}/{$append}", 'Last Page');?></li>
        </ul>
</div>