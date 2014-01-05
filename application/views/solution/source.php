<?php /* @var Model_Solution $solution */ ?>
<div class="row solution">
<ul class="list-group solution-info col-sm-2">
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->problem_id);?></span>
        Problem
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->user_id);?></span>
        User
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->display_language());?></span>
        Language
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->display_result());?></span>
        Result
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->time);?>ms</span>
        Time
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->memory);?>kb</span>
        Memory
    </li>
</ul>
<pre class="prettyprint linenums solution-code col-sm-10">
<?php echo(htmlentities($solution->code()));?>
</pre>
</div>
<script type="text/javascript">
    $(prettyPrint());
</script>