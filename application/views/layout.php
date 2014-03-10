<!DOCTYPE html>
<html>
<head>
    <title><?php echo($title); ?></title>
    <?php echo(View::factory('block/head')); ?>
</head>
<body>
    <?php echo(View::factory('block/nav_before')); ?>
        <li <?php if (Request::$current->controller() == 'Index' AND Request::$current->action() == 'index'):?>class="active" <?php endif;?>><a href="<?php e::home();?>">Home</a></li>
        <li <?php if (Request::$current->controller() == 'Problem'):?>class="active" <?php endif;?>><a href="<?php e::url('problem/list');?>">Problem</a></li>
        <li <?php if (Request::$current->controller() == 'Solution' AND Request::$current->action() == 'status'):?>class="active" <?php endif;?>><a href="<?php e::url('status');?>">Status</a></li>
        <li <?php if (Request::$current->controller() == 'User' AND Request::$current->action() == 'list' ):?>class="active" <?php endif;?>><a href="<?php e::url('rank/user');?>">Rank</a></li>
        <li <?php if (Request::$current->controller() == 'Contest'):?>class="active" <?php endif;?>><a href="<?php e::url('contest');?>">Contest</a></li>
        <li <?php if (Request::$current->action() == 'faqs'):?>class="active" <?php endif;?>><a href="<?php e::url('faqs');?>">Faqs</a></li>
        <li <?php if (Request::$current->controller() == 'Discuss'):?>class="active" <?php endif;?>><a href="<?php e::url('discuss');?>">Discuss</a></li>
    <?php echo(View::factory('block/nav_after')); ?>
    <div class="container">
        <?php echo(View::factory('block/messages')); ?>
        <?php echo($body); ?>
    </div>
    <?php echo(View::factory('block/footer')); ?>
</body>
</html>
