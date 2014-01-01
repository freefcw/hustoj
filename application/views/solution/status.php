<form action="/status" method="GET" class="form-inline status-filter" role="form">
    <div class="form-group">
        <label class="sr-only" for="pid">Problem ID</label>
        <input placeholder="Problem ID" name="pid" id="pid" class="form-control"/>
    </div>
    <div class="form-group">
        <label class="sr-only" for="udi">User ID</label>
        <input placeholder="User ID" name="uid" id="uid" class="form-control"/>
    </div>
    <div class="form-group">
        <label class="sr-only" for="language">Language</label>
        <select name="language" class="form-control">
            <option value="-1" selected="selected">Language</option>
        <?php foreach(OJ::$language as $key=>$lang):?>
            <option value="<?php echo $key; ?>"><?php echo OJ::lang($key);?></option>
        <?php endforeach;?>
        </select>
    </div>
    <div class="form-group">
        <label class="sr-only" for="result">Result</label>
        <select name="result" class="form-control">
            <option value="-1" selected="selected">Result</option>
        <?php foreach(OJ::$status as $key=>$lang):?>
            <option value="<?php echo $key; ?>"><?php echo OJ::jresult($key);?></option>
        <?php endforeach;?>
        </select>
    </div>
    <input type="submit" value="Filter" class="btn">
</form>

<table class="table table-striped">
	<thead>
		<tr><th>Run ID</th><th>Problem</th><th>User ID</th><th>Result</th><th>Time</th><th>Memory</th><th>Language</th><th>Code Length</th><th>Submit Time</th></tr>
	</thead>
	<tbody>
<?php /* @var Model_Solution[] $list */?>
<?php foreach($list as $i): ?>
    <tr>
        <td><?php echo $i->solution_id;?></td>
        <td><?php echo html::anchor("/problem/show/{$i->problem_id}", $i->problem_id);?></td>
        <td><?php echo html::anchor("/u/{$i->user_id}", $i->user_id);?></td>
        <td><?php echo OJ::jresult($i->result);?></td>
        <td><?php if($i->result == 4) echo $i->time, 'ms'; else echo('----');?></td>
        <td><?php if($i->result == 4) echo $i->memory, 'kb'; else echo('----');?></td>
        <td><?php echo OJ::lang($i->language);?></td>
        <td><?php echo $i->code_length;?>B</td>
        <td><?php echo($i->in_date);?></td>
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