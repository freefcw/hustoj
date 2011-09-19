<h1><?php echo $p->problem_id;?>-- <?php echo $p->title; ?></h1>
Time Limit: <?php echo $p->time_limit;?>S Memory Limit: <?php echo $p->memory_limit;?>MB
Submissions: <?php echo $p->submit;?>  Solved: <?php echo $p->accepted;?>
<dl>
<dt>Desctiption</dt>
<dd><?php echo $p->description;?></dd>
<dt>Input</dt>
<dd><?php echo $p->input;?></dd>
<dt>Output</dt>
<dd><?php echo $p->output;?></dd>
<dt>Sample Input</dt>
<dd><?php echo $p->sample_input;?></dd>
<dt>Sample Output</dt>
<dd><?php echo $p->sample_output;?></dd>
<dt>Hint</dt>
<dd><?php echo $p->hint; ?></dd>
<dt>Source</dt>
<dd><?php echo $p->source; ?></dd>
</dl>
<ul>
<li><?php echo html::anchor("/problem/submit/{$p->problem_id}", 'Submit');?></li>
<li><?php echo html::anchor("/problem/status/{$p->problem_id}", 'Status');?></li>
<li><?php echo html::anchor("/discuss/{$p->problem_id}", 'Discuss');?></li>
</ul>