<?php if ( Request::$current->query('cid') ):?>
    <?php echo(View::factory('contest/header', array('title' => $title, 'cid' => Request::$current->query('cid'), 'contest' => $contest)));?>
<?php else:?>
<form action="<?php e::url('/status');?>" method="GET" class="form-inline status-filter" role="form">
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
<?php endif;?>
<table class="table table-striped">
	<thead>
		<tr><th>Run ID</th><th>Problem</th><th>User ID</th><th>Result</th><th>Time</th><th>Memory</th><th>Language</th><th>Code Length</th><th>Submit Time</th></tr>
	</thead>
	<tbody>
<?php /* @var Model_Solution[] $list */?>
<?php foreach($list as $i): ?>
    <tr>
        <td><?php echo $i->solution_id;?></td>
        <td><?php e::anchor("/problem/show/{$i->problem_id}", $i->problem_id);?></td>
        <td><?php e::anchor("/u/{$i->user_id}", $i->user_id);?></td>
        <td>
            <?php echo OJ::jresult($i->result);?>
            <?php if (OJ::is_io_mode()) echo $i->display_pass_rate(); ?>
        </td>
        <td><?php if($i->result == 4) echo $i->time, 'ms'; else echo('----');?></td>
        <td><?php if($i->result == 4) echo $i->memory, 'kb'; else echo('----');?></td>
        <td><?php echo OJ::lang($i->language);?></td>
        <td><?php if ( $current_user AND $i->allow_view_code($current_user)):?>
        <a href="<?php e::url("/solution/source/{$i->solution_id}");?>" title="click view source"><?php echo $i->code_length;?>B</a>
        <?php else:?>
        <?php echo $i->code_length;?>B
        <?php endif;?></td>
        <td><?php echo($i->in_date);?></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>
<?php echo(View::factory('common/pager', array('base_url' => '/status', 'total' => $total)));?>