<!DOCTYPE html>
<html>
<head>
    <title><?php echo($title); ?></title>
    <?php echo(View::factory('block/head')); ?>
</head>
<body>
    <?php echo(View::factory('block/nav_before')); ?>
        <li <?php if (Request::$current->controller() == 'Index'):?>class="active" <?php endif;?>><a href="<?php e::url('admin');?>">Home</a></li>
        <li <?php if (Request::$current->controller() == 'Problem'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/problem');?>">Problem</a></li>
        <li <?php if (Request::$current->controller() == 'User'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/user');?>">User</a></li>
        <li <?php if (Request::$current->controller() == 'Contest'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/contest');?>">Contest</a></li>
        <li <?php if (Request::$current->controller() == 'News'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/news');?>">News</a></li>
        <li <?php if (Request::$current->controller() == 'Setting'):?>class="active" <?php endif;?>><a href="<?php e::url('admin/setting');?>">Configure</a></li>
        <li <?php if (Request::$current->controller() == 'Discuss'):?>class="active" <?php endif;?>><a href="#">Discuss</a></li>
    <?php echo(View::factory('block/nav_after')); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-1 sidebar">
                <?php echo View::factory('admin/'. strtolower(Request::current()->controller()).'/sidebar');?>
            </div>
            <div class="col-md-11">
                <h3><?php echo $title;?></h3>
                <?php echo(View::factory('block/messages')); ?>
                <?php echo($body); ?>
            </div>
        </div>
    </div>
    <?php echo(View::factory('block/footer')); ?>
</body>
</html>
