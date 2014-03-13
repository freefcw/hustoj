<h3 class="page-title"><?php echo($title);?></h3>
<div class="contest-info">
From <span class="label label-success"><?php echo($contest->start_time);?></span> To <span class="label label-danger"><?php echo($contest->end_time);?></span> Now is <span class="label label-warning"><?php echo(date('Y-m-d H:i:s'));?></span> Status: <span class="label label-info"><?php echo(e::private_value($contest['private']));?></span>
</div>
<ul class="nav nav-pills contest-nav" id="fn-nav">
<li <?php if (Request::$current->action() == 'show'):?> class="active" <?php endif;?>><?php echo HTML::anchor("/contest/show/{$cid}", 'Problems');?></li>
<li <?php if (Request::$current->action() == 'standing'):?> class="active" <?php endif;?>><?php echo HTML::anchor("/contest/standing/{$cid}", 'Standing');?></li>
<li <?php if (Request::$current->action() == 'statistics'):?> class="active" <?php endif;?>><?php echo HTML::anchor("/contest/statistics/{$cid}", 'Statistics');?></li>
<li <?php if (Request::$current->action() == 'status'):?> class="active" <?php endif;?>><a href="<?php e::url("/status?cid={$cid}");?>">Status</a></li>
<li <?php if (Request::$current->action() == 'talk'):?> class="active" <?php endif;?>><?php echo HTML::anchor("/contest/talk?cid={$cid}", 'Clarification');?></li>
</ul>
