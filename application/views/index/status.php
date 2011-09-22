<h1> HUST OJ STATUS</h1>
<?php if(function_exists('apc_cache_info')): ?>
<?php $_apc_cache_info = apc_cache_info(); ?>
<div style="text-align:center">
<div style="margin: auto; width:400px; text-align:left">
<h4>Alternative PHP Cache:<strong>ACTIVE</strong></h4>
<strong>Performace Data<strong>
<dl id="apc">
	<dt>Hits: </dt><dd><?php echo $_apc_cache_info['num_hits']?></dd>
	<dt>Misses: </dt><dd><?php echo $_apc_cache_info['num_misses']?></dd>
	<dt>Entries: </dt><dd><?php echo $_apc_cache_info['num_entries']?></dd>
	<dt>Inserts: </dt><dd><?php echo $_apc_cache_info['num_inserts']?></dd>
	<dt>Cached Files: </dt><dd><?php echo $_apc_cache_info['mem_size']/1024?>KB</dd>
</dl>
</div>
</div>
<?php endif;?>