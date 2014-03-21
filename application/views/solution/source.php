<?php /* @var Model_Solution $solution */ ?>
<div class="row solution">
<ul class="list-group solution-info col-sm-2">
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->problem_id);?></span>
        <?php echo(__('solution.source.problem_id')); ?>
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->user_id);?></span>
        <?php echo(__('solution.source.user')); ?>
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->display_language());?></span>
        <?php echo(__('solution.source.language')); ?>
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->display_result());?></span>
        <?php echo(__('solution.source.result')); ?>
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->time);?>ms</span>
        <?php echo(__('solution.source.time')); ?>
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->memory);?>kb</span>
        <?php echo(__('solution.source.memory')); ?>
    </li>
</ul>
<pre class="prettyprint linenums solution-code col-sm-10">
<?php echo(htmlentities($solution->source()));?>
</pre>
<?php if ($cinfo): ?>
    <pre class="col-sm-12 linenums"><?php echo($cinfo->error); ?></pre>
<?php endif; ?>
<?php if ($rinfo): ?>
    <pre class="col-sm-12 linenums"><?php echo($rinfo->error); ?></pre>
<?php endif; ?>
</div>
<script type="text/javascript">
    $(prettyPrint());
</script>
