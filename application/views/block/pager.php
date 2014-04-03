<?php
// prepare
$page = Request::$current->query('page');
?>
<ul class="pager double-side-pager">
    <?php if ($page != 1):?>
        <li class="previous"><a href="<?php e::gen_pager_url($base_url, $page - 1);?>"><?php echo(__('pager.newer')); ?></a></li>
    <?php endif;?>
    <?php if ($page < $total): ?>
        <li class="next"><a href="<?php e::gen_pager_url($base_url, $page + 1);?>"><?php echo(__('pager.older')); ?></a></li>
    <?php endif;?>
</ul>
