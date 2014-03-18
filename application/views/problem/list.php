<ul class="pagination problem-pagination">
<?php for($i = 1; $i <= $pages; $i++): ?>
    <li<?php if($i == $page):?> class="active"<?php endif;?>><a href="<?php e::url("/problem/list/{$i}");?>"><?php echo($i);?></a></li>
<?php endfor;?>
</ul>
<div class="problem-search">
<?php echo(View::factory('problem/searchform'));?>
</div>
<table class="table table-striped">
<thead>
    <tr>
        <th><?php echo(__('problem.list.id')); ?></th>
        <th><?php echo(__('problem.list.title')); ?></th>
        <th><?php echo(__('problem.list.ratio_ac_submit')); ?></th>
    </tr>
</thead>
<tbody>
<?php /* @var Model_Problem[] $problemlist */ ?>
<?php foreach($problemlist as $problem): ?>
    <tr>
        <td class="pid <?php echo e::pass_status($problem);?>"><?php echo($problem->problem_id); ?></td>
        <td class="ptitle"><?php echo HTML::anchor("/problem/show/{$problem->problem_id}", $problem->title);?></td>
        <td><?php echo($problem->accepted); ?>/<?php echo($problem->submit); ?></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>
