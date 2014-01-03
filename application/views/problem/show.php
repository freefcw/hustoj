<?php /* @var Model_Problem $p */
if (isset($cid)) {
    echo(View::factory('contest/nav', array('title' => $title, 'contest' => $contest, 'cid'=>$cid)));
} ?>
<h1 class="page-title"><?php if (isset($cid)) {
    echo(OJ::contest_pid($pid));
} else {
    echo($p['problem_id']);
} ?>
    -- <?php echo($p['title']); ?></h1>
<div class="content-info">
    <p>Time Limit: <span class="label label-warning"><?php echo($p['time_limit']);?>S</span> Memory Limit: <span
            class="label label-danger"><?php echo($p['memory_limit']);?>MB</span><br/>
    </p>
    <div>
        <?php if ($p->is_special_judge()):?><span class="label label-danger">Special Judge</span><?php endif;?>
        Submissions: <?php echo($p['submit']);?>
        Solved: <?php echo($p['accepted']);?>
    </div>
</div>
<dl id="detail">
    <dt>Desctiption</dt>
    <dd><?php echo($p['description']);?></dd>
    <dt>Input</dt>
    <dd><?php echo($p['input']);?></dd>
    <dt>Output</dt>
    <dd><?php echo($p['output']);?></dd>
    <dt>Sample Input</dt>
    <dd>
        <pre><?php echo($p['sample_input']);?></pre>
    </dd>
    <dt>Sample Output</dt>
    <dd>
        <pre><?php echo($p['sample_output']);?></pre>
    </dd>
    <dt>Hint</dt>
    <dd><?php echo($p['hint']); ?></dd>
    <dt>Source</dt>
    <dd><?php echo($p['source']); ?></dd>
</dl>

<?php
if (isset($cid)) {
    $submit_url = "/problem/submit/?cid={$cid}&pid={$pid}";
} else {
    $submit_url = "/problem/submit/{$p['problem_id']}";
}
?>
<ul id="fn-nav" class="nav nav-pills">
    <li><?php echo(html::anchor($submit_url, 'Submit'));?></li>
    <li><?php echo(html::anchor("/problem/summary/{$p['problem_id']}", 'Summary'));?></li>
    <li><?php echo(html::anchor("/discuss?pid={$p['problem_id']}", 'Discuss'));?></li>
</ul>