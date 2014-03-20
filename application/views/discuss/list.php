<?php if ( ! isset($cid) ):?>
<ul class="breadcrumb">
<li>
    <a href="<?php e::url('/discuss/');?>"><?php echo(__('discuss.list.discuss')); ?></a>
    <?php if (Request::current()->query('pid')):?>
    <span class="divider">/</span> <a href="<?php e::url('/problem/show/'. Request::current()->query('pid'));?>"><?php echo Request::current()->query('pid');?></a>
    <?php endif;?>
</li>
</ul>
<form class="form-inline well" role="form" action="<?php e::url('/discuss');?>" method="GET">
    <div class="form-group">
        <label class="sr-only" for="pid"><?php echo(__('discuss.list.problem_id')); ?></label>
        <input placeholder="<?php echo(__('discuss.list.problem_id')); ?>" name="pid" id="pid" class="form-control"/>
    </div>
    <div class="form-group">
        <label class="sr-only" for="uid"><?php echo(__('discuss.list.user_id')); ?></label>
        <input placeholder="<?php echo(__('discuss.list.user_id')); ?>" name="uid" id="uid" class="form-control"/>
    </div>
    <input type="submit" value="<?php echo(__('discuss.list.filter')); ?>" class="btn btn-default">
    <a href="<?php e::url('/discuss/new');?>" class="btn btn-info pull-right"><?php echo(__('discuss.list.new_topic')); ?></a>
</form>
<?php else:?>
    <?php echo(View::factory('contest/header', array('title' => $title, 'cid' => Request::$current->query('cid'), 'contest' => $contest)));?>
<div class="well">
    <a href="<?php e::url("/discuss/new?cid={$cid}");?>" class="btn btn-info"><?php echo(__('discuss.list.new_topic')); ?></a>
</div>
<?php endif;?>
<hr class="clearfix"/>
<?php if ( OJ::is_admin() ):?>
<form action="<?php e::url('discuss/batch');?>" method="post">
<?php endif;?>
<table class="table table-bordered">
    <thead>
    <tr>
        <?php if ( OJ::is_admin() ):?>
            <th><input type="checkbox" id="select-all-topic"/></th>
        <?php endif;?>
        <th class="col-sm-1"><?php echo(__('discuss.list.problem_id')); ?></th>
        <th><?php echo(__('discuss.list.title')); ?></th>
        <th class="col-sm-2"><?php echo(__('discuss.list.author')); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php /* @var Model_Topic[] $topic_list */ foreach ($topic_list as $t): ?>
    <tr>
        <?php if ( OJ::is_admin() ):?>
        <td>
            <input type="checkbox" name="tid[]" value="<?php echo($t->tid);?>"/>
        </td>
        <?php endif;?>
        <td>
            <?php if ($t->pid):?><a href="<?php e::url("problem/show/{$t->pid}");?>" style="color: #000000"> <?php echo($t->pid);?> </a><?php endif;?></td>
        <td>
            <a href="<?php e::url("t/{$t->tid}");?>"><strong><?php echo($t->title);?></strong></a>
        </td>
        <td><a href="<?php echo(Route::url('profile', array('uid' => $t->author_id)));?>"><?php echo($t->author_id);?></a></td>
    </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php if ( OJ::is_admin() ):?>
    <button name="action" value="deletetopic" class="btn btn-warning"><?php echo(__('discuss.list.delete')); ?></button>
    <button class="btn btn-danger" name="action" value="andblockuser"><?php echo(__('discuss.list.delete_block')); ?></button>
    </form>
<?php endif;?>
<ul class="pager double-side-pager">
    <?php $page = Request::$current->query('page');?>
    <?php if ($page != 1):?>
        <?php
        $params = Request::$current->query();
        $params['page'] = $page - 1;
        $query_param = URL::query($params);
        ?>
        <li class="previous"><?php echo HTML::anchor("discuss/{$query_param}", __('pager.newer'));?></li>
    <?php endif;?>
    <?php if ($page < $total): ?>
        <?php
        $params['page'] = $page + 1;
        $query_param = URL::query($params);
        ?>
        <li class="next"><?php echo HTML::anchor("discuss/{$query_param}", __('pager.older'));?></li>
    <?php endif;?>
</ul>
