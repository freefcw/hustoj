<ul class="pills contest-nav">
<li><?php echo html::anchor("/contest/show/{$cid}", 'Problems');?></li>
<li><?php echo html::anchor("/contest/standing/{$cid}", 'Standing');?></li>
<li><?php echo html::anchor("/contest/statics/{$cid}", 'Statistics');?></li>
<li><?php echo html::anchor("/problem/status?cid={$cid}", 'Status');?></li>
<li><?php echo html::anchor("/discuss/contest/{$cid}", 'Clarification');?></li>
</ul>