<h3 class="page-title"><?php echo $title;?></h3>
<div class="content-info">
From <span class="label success"><?php echo OJ::mtime($contest['start_time']);?></span> To <span class="label important"><?php echo OJ::mtime($contest['end_time']);?></span> Now is <span class="label warning"><?php echo date('Y-m-d H:i:s');?></span> Status: <span class="label notice"><?php echo OJ::is_private($contest['private']);?></span>
</div>
<ul class="pills contest-nav">
<li><?php echo html::anchor("/contest/show/{$cid}", 'Problems');?></li>
<li><?php echo html::anchor("/contest/standing/{$cid}", 'Standing');?></li>
<li><?php echo html::anchor("/contest/statics/{$cid}", 'Statistics');?></li>
<li><?php echo html::anchor("/problem/status?cid={$cid}", 'Status');?></li>
<li><?php echo html::anchor("#!/discuss/contest/{$cid}", 'Clarification');?></li>
</ul>