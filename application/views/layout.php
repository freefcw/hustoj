<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="keyword" content="<?php echo(e::get_website_keyword()); ?>"/>
    <meta name="description" content="<?php echo(e::get_website_desc()); ?>"/>
    <meta name="robots" content="index,follow"/>
    <title><?php echo($title); ?></title>
    <?php echo View::factory('block/head');?>
</head>
<body>
<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php e::home();?>"><?php echo(e::get_website_name()); ?></a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
<?php
    if ( OJ::is_backend())
        echo View::factory('block/top_backend');
    else
        echo View::factory('block/top_frontend');
?>
        </div><!--/.nav-collapse -->

    </div>
</div>
<div class="container">
<?php if (OJ::is_backend()):?>
    <div class="row">
        <div class="col-md-1 sidebar">
            <?php echo View::factory('admin/'. strtolower(Request::current()->controller()).'/sidebar');?>
        </div>
        <div class="col-md-11">
            <h3><?php echo $title;?></h3>
            <?php echo View::factory('common/message');?>
            <?php echo($body); ?>
        </div>
    </div>
<?php else:?>
    <?php echo View::factory('common/message');?>
    <?php echo($body); ?>
<?php endif;?>
</div>
<?php echo(View::factory('footer')); ?>
</body>
</html>
