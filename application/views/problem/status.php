<form action="/problem/status" method="GET" class="inline-inputs" style="width: 800px; margin: 15px auto 5px;"
<span>Problem ID: </span><input type="text" name="pid" class="span2">
<span> User ID:</span><input type="text" name="uid" class="span2">
<span> Language:</span>
<select name="language" class="span1">
<option value="-1" selected="selected">All</option>
<?php foreach(OJ::$language as $key=>$lang):?>
<option value="<?php echo $key; ?>"><?php echo OJ::lang($key);?></option>
<?php endforeach;?>
</select>
<span> Result:</span>
<select name="result" class="span2">
<option value="-1" selected="selected">All</option>
<?php foreach(OJ::$status as $key=>$lang):?>
<option value="<?php echo $key; ?>"><?php echo OJ::jresult($key);?></option>
<?php endforeach;?>
</select>
<input type="submit" value="Filter" class="btn">
</form>
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