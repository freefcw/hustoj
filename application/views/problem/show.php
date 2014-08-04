<?php /* @var Model_Problem $problem */
if (isset($cid)) {
    echo(View::factory('contest/header', array('title' => $title, 'contest' => $contest, 'cid'=>$cid)));
} ?>
<h1 class="page-title"><?php if (isset($cid)) {
    echo(e::contest_pid($pid));
} else {
    echo($problem['problem_id']);
} ?>
    - <?php echo($problem['title']); ?></h1>
<div class="contest-info">
    <p>
        <?php echo(__('problem.show.time_limit')); ?><span class="label label-warning"><?php echo($problem['time_limit']);?><?php echo(__('problem.show.second')); ?></span>
        <?php echo(__('problem.show.memory_limit')); ?><span class="label label-danger"><?php echo($problem['memory_limit']);?><?php echo(__('problem.show.MB')); ?></span><br/>
    </p>
    <div>
        <?php if ($problem->is_special_judge()):?><span class="label label-danger"><?php echo(__('problem.show.spj'));?></span><?php endif;?>
        <?php echo(__('problem.show.submissions_:count', array(':count' => $problem['submit'])));?>
        <?php echo(__('problem.show.solved_:count', array(':count' => $problem['accepted'])));?>
    </div>
</div>
<dl class="detail">
    <dt><?php echo(__('problem.show.description')); ?></dt>
    <dd id="problem-desc"><?php echo($problem['description']);?></dd>
    <dt><?php echo(__('problem.show.input')); ?></dt>
    <dd><?php echo($problem['input']);?></dd>
    <dt><?php echo(__('problem.show.output')); ?></dt>
    <dd><?php echo($problem['output']);?></dd>
    <dt><?php echo(__('problem.show.sample_input')); ?></dt>
    <dd>
        <pre><?php echo(htmlspecialchars($problem['sample_input']));?></pre>
    </dd>
    <dt><?php echo(__('problem.show.sample_output')); ?></dt>
    <dd>
        <pre><?php echo(htmlspecialchars($problem['sample_output']));?></pre>
    </dd>
    <dt><?php echo(__('problem.show.hint')); ?></dt>
    <dd><?php echo($problem['hint']); ?></dd>
    <dt><?php echo(__('problem.show.source')); ?></dt>
    <dd><?php echo($problem['source']); ?></dd>
</dl>

<?php
if (isset($cid)) {
    $submit_url = "/problem/submit/?cid={$cid}&pid={$pid}";
} else {
    $submit_url = "/problem/submit/{$problem['problem_id']}";
}
?>
<ul id="fn-nav" class="nav nav-pills">
    <li><?php echo HTML::anchor($submit_url, __('problem.show.submit'));?></li>
    <li><?php echo HTML::anchor("/problem/summary/{$problem['problem_id']}", __('problem.show.summary'));?></li>
    <li><?php echo HTML::anchor("/discuss?pid={$problem['problem_id']}", __('problem.show.discuss'));?></li>
</ul>
