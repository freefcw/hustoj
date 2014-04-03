<?php if ( Request::$current->query('cid') ):?>
    <?php echo(View::factory('contest/header', array('title' => $title, 'cid' => Request::$current->query('cid'), 'contest' => $contest)));?>
<?php else:?>
<form action="<?php e::url('/status');?>" method="GET" class="form-inline status-filter" role="form">
    <div class="form-group">
        <label class="sr-only" for="pid"><?php echo(__('solution.status.problem_id')); ?></label>
        <input placeholder="<?php echo(__('solution.status.problem_id')); ?>" name="pid" id="pid" class="form-control"/>
    </div>
    <div class="form-group">
        <label class="sr-only" for="udi"><?php echo(__('solution.status.user_id')); ?></label>
        <input placeholder="<?php echo(__('solution.status.user_id')); ?>" name="uid" id="uid" class="form-control"/>
    </div>
    <div class="form-group">
        <label class="sr-only" for="language"><?php echo(__('solution.status.language')); ?></label>
        <select name="language" class="form-control">
            <option value="-1" selected="selected"><?php echo(__('solution.status.language')); ?></option>
        <?php foreach( OJ::$language as $key=>$lang):?>
            <option value="<?php echo $key; ?>"><?php echo e::lang($key);?></option>
        <?php endforeach;?>
        </select>
    </div>
    <div class="form-group">
        <label class="sr-only" for="result"><?php echo(__('solution.status.result')); ?></label>
        <select name="result" class="form-control">
            <option value="-1" selected="selected"><?php echo(__('solution.status.result')); ?></option>
        <?php foreach( OJ::$status as $key=>$lang):?>
            <option value="<?php echo $key; ?>"><?php echo(__(e::jresult($key)));?></option>
        <?php endforeach;?>
        </select>
    </div>
    <input type="submit" value="<?php echo(__('solution.status.filter')); ?>" class="btn btn-default">
</form>
<?php endif;?>
<table class="table table-striped">
	<thead>
	<tr>
		<th><?php echo(__('solution.status.runid')); ?></th>
		<th><?php echo(__('solution.status.problem_id')); ?></th>
		<th><?php echo(__('solution.status.user_id')); ?></th>
		<th><?php echo(__('solution.status.result')); ?></th>
		<th><?php echo(__('solution.status.time')); ?></th>
		<th><?php echo(__('solution.status.memory')); ?></th>
		<th><?php echo(__('solution.status.language')); ?></th>
		<th><?php echo(__('solution.status.code_length')); ?></th>
		<th><?php echo(__('solution.status.submit_time')); ?></th>
	</tr>
	</thead>
	<tbody>
<?php /* @var Model_Solution[] $list */?>
<?php foreach($list as $i): ?>
    <tr>
        <td><?php if ( $current_user AND $i->allow_view_code($current_user)):?>
        <a href="<?php e::url("/solution/source/{$i->solution_id}");?>" title="click view details"><?php echo $i->solution_id;?></a>
        <?php else:?>
        <?php echo $i->solution_id;?>
        <?php endif;?></td>
        <td><?php echo HTML::anchor("/problem/show/{$i->problem_id}", $i->problem_id);?></td>
        <td><?php echo HTML::anchor("/u/{$i->user_id}", $i->user_id);?></td>
        <td>
            <?php echo(__(e::jresult($i->result)));?>
            <?php if (OJ::is_oi_mode()) echo $i->display_pass_rate(); ?>
        </td>
        <td><?php if($i->result == 4) echo $i->time, 'ms'; else echo('----');?></td>
        <td><?php if($i->result == 4) echo $i->memory, 'kb'; else echo('----');?></td>
        <td><?php echo e::lang($i->language);?></td>
        <td><?php if ( $current_user AND $i->allow_view_code($current_user)):?>
        <a href="<?php e::url("/solution/source/{$i->solution_id}");?>" title="click view details"><?php echo $i->code_length;?>B</a>
        <?php else:?>
        <?php echo $i->code_length;?>B
        <?php endif;?></td>
        <td><?php echo($i->in_date);?></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>
<?php echo(View::factory('block/pager', array('base_url' => '/status', 'total' => $total)));?>
