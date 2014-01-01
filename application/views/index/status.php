<h2> Online Judge Status</h2>
<?php if(function_exists('apc_cache_info')): ?>
<?php $_apc_cache_info = apc_cache_info(); ?>
<div style="text-align:left">
<div class="span4">
<h5 title="Alternative PHP Cache">APC:</h5>
<ul id="apc" style="list-style: none; margin-left: 15px">
    <li>Start at: <?php echo(date("Y-n-d g:i:s", $_apc_cache_info['start_time']));?></li>
	<li>Hits: <?php echo($_apc_cache_info['num_hits']); ?></li>
	<li>Misses: <?php echo($_apc_cache_info['num_misses']); ?></li>
	<li>Entries: <?php echo($_apc_cache_info['num_entries']); ?></li>
	<li>Inserts: <?php echo($_apc_cache_info['num_inserts']); ?></li>
	<li>Cached Files: <?php printf('%.2f', $_apc_cache_info['mem_size']/1024/1024); ?>MB</li>
</ul>
</div>
</div>
<?php endif;?>