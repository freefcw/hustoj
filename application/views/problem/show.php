<h1><?php echo $p->problem_id;?>-- <?php echo $p->title; ?></h1>
<div id="problem-info">
Time Limit: <?php echo $p->time_limit;?>S Memory Limit: <?php echo $p->memory_limit;?>MB<br />
Submissions: <?php echo $p->submit;?>  Solved: <?php echo $p->accepted;?>
</div>
<dl id="detail">
<dt>Desctiption</dt>
<dd><?php echo $p->description;?></dd>
<dt>Input</dt>
<dd><?php echo $p->input;?></dd>
<dt>Output</dt>
<dd><?php echo $p->output;?></dd>
<dt>Sample Input</dt>
<dd><pre><?php echo $p->sample_input;?></pre></dd>
<dt>Sample Output</dt>
<dd><pre><?php echo $p->sample_output;?></pre></dd>
<dt>Hint</dt>
<dd><?php echo $p->hint; ?></dd>
<dt>Source</dt>
<dd><?php echo $p->source; ?></dd>
</dl>
<div class="fn-nav">
<?php echo html::anchor("/problem/submit/{$p->problem_id}", 'Submit');?>
<?php echo html::anchor("/problem/summary/{$p->problem_id}", 'Summary');?>
<?php echo html::anchor("/discuss/problem/{$p->problem_id}", 'Discuss');?>
</div>