<ul class="pagination problem-pagination">
<?php for($i = 1; $i <= $pages; $i++): ?>
    <li<?php if($i == Request::$current->param('id', 1)):?> class="active"<?php endif;?>><a href="<?php e::url("/problem/list/{$i}");?>"><?php echo($i);?></a></li>
<?php endfor;?>
</ul>
<div class="problem-search">
<?php echo(View::factory('problem/searchform'));?>
</div>
<table class="table table-striped">
<thead>
    <tr>
        <?php /* @var Model_User $current_user */if ($current_user):?><th></th><?php endif;?>
        <th>ID</th><th>TITLE</th><th>Ratio(AC/Submit)</th>
    </tr>
</thead>
<tbody>
<?php /* @var Model_Problem[] $problemlist */ ?>
<?php foreach($problemlist as $problem): ?>
    <tr>
    <?php if ($current_user):?>
        <td><?php if ($current_user->is_problem_resolved($problem->problem_id)):?><span class="resolved-problem">Y</span><?php endif;?></td>
    <?php endif;?>
        <td class="pid"><?php echo($problem->problem_id); ?></td>
        <td class="ptitle"><?php echo HTML::anchor("/problem/show/{$problem->problem_id}", $problem->title);?></td>
        <td><?php echo($problem->accepted); ?>/<?php echo($problem->submit); ?></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>
