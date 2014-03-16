<h1><?php echo(__('problem.search.search_:text_in_:area', array(':text' => $search_text, ':area' => __($area))));?></h1>

<?php echo(View::factory('problem/searchform'));?>

<table class="table table-striped">
<thead>
    <tr>
        <th><?php echo(__('problem.list.id')); ?></th>
        <th><?php echo(__('problem.list.title')); ?></th>
        <th><?php echo(__('problem.list.ratio_ac_submit')); ?></th>
    </tr>
</thead>
<tbody>
<?php foreach($problemlist as $problem): ?>
    <tr>
        <td class="pid"><?php echo($problem->problem_id); ?></td>
        <td class="ptitle"><?php echo HTML::anchor("/problem/show/{$problem->problem_id}", $problem->title);?>
        <?php if ($problem->source != ''): ?>
            <span> - <?php echo($problem->source);?></span>
        <?php endif;?>
        </td>
        <td><?php echo($problem->accepted); ?>/<?php echo($problem->submit); ?></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>
