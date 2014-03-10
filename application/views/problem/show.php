<?php /* @var Model_Problem $problem */
if (isset($cid)) {
    echo(View::factory('contest/header', array('title' => $title, 'contest' => $contest, 'cid'=>$cid)));
} ?>
<h1 class="page-title"><?php if (isset($cid)) {
    echo(e::contest_pid($pid));
} else {
    echo($problem['problem_id']);
} ?>
    -- <?php echo($problem['title']); ?></h1>
<div class="contest-info">
    <p>Time Limit: <span class="label label-warning"><?php echo($problem['time_limit']);?>S</span> Memory Limit: <span
            class="label label-danger"><?php echo($problem['memory_limit']);?>MB</span><br/>
    </p>
    <div>
        <?php if ($problem->is_special_judge()):?><span class="label label-danger">Special Judge</span><?php endif;?>
        Submissions: <?php echo($problem['submit']);?>
        Solved: <?php echo($problem['accepted']);?>
    </div>
</div>
<dl class="detail">
    <dt>Desctiption</dt>
    <dd><?php echo($problem['description']);?></dd>
    <dt>Input</dt>
    <dd><?php echo($problem['input']);?></dd>
    <dt>Output</dt>
    <dd><?php echo($problem['output']);?></dd>
    <dt>Sample Input</dt>
    <dd>
        <pre><?php echo($problem['sample_input']);?></pre>
    </dd>
    <dt>Sample Output</dt>
    <dd>
        <pre><?php echo($problem['sample_output']);?></pre>
    </dd>
    <dt>Hint</dt>
    <dd><?php echo($problem['hint']); ?></dd>
    <dt>Source</dt>
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
    <li><?php echo HTML::anchor($submit_url, 'Submit');?></li>
    <li><?php echo HTML::anchor("/problem/summary/{$problem['problem_id']}", 'Summary');?></li>
    <li><?php echo HTML::anchor("/discuss?pid={$problem['problem_id']}", 'Discuss');?></li>
</ul>