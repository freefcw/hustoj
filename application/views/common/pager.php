<?php
// prepare
$page = Request::$current->query('page');
function gen_url($base_url, $page)
{
    $params = Request::$current->query();
    $params['page'] = $page;
    return $base_url. '/'. URL::query($params);
}
?>
<ul class="pager double-side-pager">
    <?php if ($page != 1):?>
        <li class="previous"><a href="<?php echo gen_url($base_url, $page - 1);?>">&larr; Newer</a></li>
    <?php endif;?>
    <?php if ($page < $total): ?>
        <li class="next"><a href="<?php echo gen_url($base_url, $page + 1);?>">Older &rarr;</a></li>
    <?php endif;?>
</ul>
