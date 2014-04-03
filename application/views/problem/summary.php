<div class="row">
<div class="col-sm-3">
<ul class="nav nav-pills nav-stacked">
    <li><a><?php echo(__('problem.summary.total')); ?><span class="badge pull-right"><?php echo($summary['total']);?></span></a></li>
    <li><a><?php echo(__('problem.summary.submit_user')); ?><span class="badge pull-right"><?php echo($summary['submit_user']);?></span></a></li>
    <li><a><?php echo(__('problem.summary.solved_user')); ?><span class="badge pull-right"><?php echo($summary['ac_user']);?></span></a></li>
    <?php foreach($summary['more'] as $key=>$value):?>
        <li>
            <a><?php print __(OJ::$status[$key]);?><span class="badge pull-right"><?php print $value;?></span></a>
        </li>
    <?php endforeach;?>
</ul>
</div>
<div class="col-sm-9">
<table class="table table-striped">
	<thead>
		<tr>
            <th><?php echo(__('problem.summary.rank')); ?></th>
            <th><?php echo(__('problem.summary.runid')); ?></th>
            <th><?php echo(__('problem.summary.memory')); ?></th>
            <th><?php echo(__('problem.summary.time')); ?></th>
            <th><?php echo(__('problem.summary.user')); ?></th>
            <th><?php echo(__('problem.summary.language')); ?></th>
            <th><?php echo(__('problem.summary.submit_time')); ?></th>
		</tr>
    </thead>
	<tbody>
		<?php $rank = $start_rank;?>
		<?php foreach($solutions as $item): ?>
		<?php $rank = $rank + 1; ?>
		<tr>
			<td><?php print $rank; ?></td>
			<td><?php if ( intval($item['att']) > 1 ):
                    $params = array(
                        'uid' => $item['user_id'],
                        'result' => Model_Solution::STATUS_AC,
                        'pid' => $item['problem_id'],
                    );?>
                <a href="<?php e::url('/status'. URL::query($params, false));?>"><?php print $item['solution_id'];?>(<?php print $item['att'];?>)</a>
                <?php else:?>
                <?php if ($current_user AND $current_user->can_view_code($item)):?>
                <a href="<?php e::url('/solution/source/'. $item['solution_id']);?>"><?php echo $item['solution_id'];?></a>
                <?php else:?>
                <?php echo $item['solution_id'];?>
                <?php endif;?>
                <?php endif;?>
            </td>
            <td><?php print $item['memory'];?>KB</td>
            <td><?php print $item['time'];?>MS</td>
            <td><a href="<?php e::url("/u/{$item['user_id']}");?>"><?php echo $item['user_id'];?></a></td>
            <td><?php print e::lang($item['language']);?></td>
            <td><?php echo($item['in_date']);?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php echo(View::factory('block/pager', array('base_url' => '/problem/summary/' . $problem_id, 'total' => $total)));?>
</div>
</div>
