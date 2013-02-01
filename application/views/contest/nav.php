<h3 class="page-title"><?php echo $title;?></h3>
<div class="content-info">
From <span class="label label-success"><?php echo OJ::mtime($contest['start_time']);?></span> To <span class="label label-important"><?php echo OJ::mtime($contest['end_time']);?></span> Now is <span class="label label-warning"><?php echo date('Y-m-d H:i:s');?></span> Status: <span class="label label-info"><?php echo OJ::private_value($contest['private']);?></span>
</div>
<ul class="nav nav-pills contest-nav">
<li <?php if (Request::$current->action() == 'show'):?> class="active" <?php endif;?>><?php echo html::anchor("/contest/show/{$cid}", 'Problems');?></li>
<li <?php if (Request::$current->action() == 'standing'):?> class="active" <?php endif;?>><?php echo html::anchor("/contest/standing/{$cid}", 'Standing');?></li>
<li <?php if (Request::$current->action() == 'statics'):?> class="active" <?php endif;?>><?php echo html::anchor("/contest/statics/{$cid}", 'Statistics');?></li>
<li><?php echo html::anchor("/problem/status?cid={$cid}", 'Status');?></li>
<li><?php echo html::anchor("#!/discuss/contest/{$cid}", 'Clarification');?></li>
</ul>