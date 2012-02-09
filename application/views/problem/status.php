<?php echo Form::open('/problem/status', array('method' => 'get', 'class' => 'inline-inputs', 'style' => 'width: 800px; margin-left: auto;margin-right: auto;'));?>
<span>Problem ID: </span><?php echo Form::input('pid', '', array('class' => 'span2'));?>
<span> User ID:</span><?php echo Form::input('uid', '', array('class' => 'span2'));?>
<span> Language:</span><?php echo Form::select('language', array('-1' => 'All', '0'=>'C', '1'=>'C++', '2'=>'Pascal', '3'=>'Java', '4'=>'Ohters'), '-1', array('class' => 'span1')); ?>
<span> Result:</span><?php echo Form::select('result', array("-1"=>"All", "4"=>"Accepted", "5"=>"Presentation Error", "6"=>"Wrong Answer",
	"7"=>"Time Limit Exceed", "8"=>"Memory Limit Exceed", "9"=>"Output Limit Exceed", "10"=>"Runtime Error", "11"=>"Compile Error", "0"=>"Pending", "1"=>"Pending Rejudging", "2"=>"Compiling", "3"=>"Running &amp; Judging"), '-1', array('class' => 'span2')); ?>
<?php echo Form::submit(NULL, 'Filter', array('class' => 'btn'));?>
<?php echo Form::close();?>
<table class="table table-striped">
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
<?php
    $query_param = '';
    if ($pid)
    {
        $query_param .= "pid={$pid}";
    }
    if ($uid)
    {
        if ($query_param !== '') $query_param .= '&';
        $query_param .= "uid={$uid}";
    }
    if ($language)
    {
        if ($query_param !== '') $query_param .= '&';
        $query_param .= "language={$language}";
    }
    if ($result)
    {
        if ($query_param !== '') $query_param .= '&';
        $query_param .= "result={$result}";
    }
    if ($cid)
    {
        if ($query_param !== '') $query_param .= '&';
        $query_param .= "cid={$cid}";
    }
    if (strlen($query_param) !== '') $query_param = '?'. $query_param;
	#$query_param = "?pid={$pid}&uid={$uid}&language={$language}&result={$result}&cid={$cid}";
?>
<ul class="pager" style="margin-left: 15%; margin-right: 15%">
<?php if ($page != 1):?>
<li class="previous"><?php echo html::anchor(sprintf("/problem/status/%s/{$query_param}", $page), '&larr; Newer');?></li>
<?php endif;?>
<?php if ($page == $total) $page = $total - 1; ?>
<li class="next"><?php echo html::anchor(sprintf("/problem/status/%s/{$query_param}", $page+1), 'Older &rarr;');?></li>
</ul>