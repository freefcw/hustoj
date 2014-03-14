<h3 class="page-title"><?php echo($title);?></h3>
<div class="contest-info">
    <?php echo(__('contest.header.start')); ?><span class="label label-success"><?php echo($contest->start_time);?></span>
    <?php echo(__('contest.header.end')); ?><span class="label label-danger"><?php echo($contest->end_time);?></span>
    <?php echo(__('contest.header.now')); ?><span class="label label-warning"><?php echo(date('Y-m-d H:i:s'));?></span>
    <?php echo(__('contest.header.type')); ?><span class="label label-info"><?php echo(__(e::private_value($contest['private'])));?></span>
</div>
<ul class="nav nav-pills contest-nav" id="fn-nav">
    <li <?php if (Request::$current->action() == 'show'):?> class="active" <?php endif;?>><?php echo HTML::anchor("/contest/show/{$cid}", __('contest.header.problems'));?></li>
    <li <?php if (Request::$current->action() == 'standing'):?> class="active" <?php endif;?>><?php echo HTML::anchor("/contest/standing/{$cid}", __('contest.header.standing'));?></li>
    <li <?php if (Request::$current->action() == 'statistics'):?> class="active" <?php endif;?>><?php echo HTML::anchor("/contest/statistics/{$cid}", __('contest.header.statistics'));?></li>
    <li <?php if (Request::$current->action() == 'status'):?> class="active" <?php endif;?>><a href="<?php e::url("/status?cid={$cid}");?>"><?php echo(__('contest.header.status')); ?></a></li>
    <li <?php if (Request::$current->action() == 'talk'):?> class="active" <?php endif;?>><?php echo HTML::anchor("/contest/talk?cid={$cid}", __('contest.header.clarification'));?></li>
</ul>
