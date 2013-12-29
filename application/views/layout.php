<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="keyword" content="HUST, 华中科技大学, ACM, freefcw, sempr, online judge, 计算机竞赛, 编程, ICPC"/>
    <meta name="description" content="HUST ACM - 华中科技大学ACM组织"/>
    <meta name="robots" content="index,follow"/>
    <title><?php echo $title; ?></title>
    <?php echo HTML::style('css/style.css');?>
    <?php echo HTML::script('js/jquery-1.7.1.min.js'); ?>
    <?php echo HTML::script('js/jquery-ui-1.8.18.custom.min.js'); ?>
    <?php echo HTML::script('js/bootstrap.min.js'); ?>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<body>
<div class="container">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container" style="width: auto;">
                <a class="btn btn-navbar" data-toggle="collapse" data-target="nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="/">HUSTACM</a>

                <div class="nav-collapse">
                    <ul class="nav">
                        <li><!--class="active"--><a href="/">Home</a></li>
                        <li><a href="/problem/list">Problems</a></li>
                        <li><a href="/problem/status">Status</a></li>
                        <li><a href="/rank/user">Rank</a></li>
                        <li><a href="/contest">Contest</a></li>
                        <li><a href="/faqs">Faqs</a></li>
                        <li><a href="/discuss">Discuss</a></li>
                    </ul>

                    <ul class="nav pull-right">
                <?php $cu = Auth::instance()->get_user(); if ( $cu == null): ?>
                        <li><a href="/login">Login</a></li>
                        <li><a href="/account/register">Register</a></li>
                <?php else: ?>
                        <li><a href="<?php echo(Route::url('profile', array('uid' => $cu->user_id)));?>"
                               title="<?php echo($cu->user_id);?>"><?php echo($cu->user_id);?></a></li>
                        <li><a href="/user/edit">Setting</a></li>
                        <li class="divider-vertical"></li>
                <li class="dropdown" data-dropdown="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">More</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Message</a></li>
                        <?php if (Auth::instance()->is_admin()): ?>
                            <li><a href="/admin">Admin Control</a></li>
                        <?php endif; ?>
                        <li class="divider"></li>
                        <li><a href="/logout">Logout</a></li>
                <?php endif; ?>
                    </ul>
                    </li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </div>
        </div>
        <!-- /navbar-inner -->
    </div>

    <div id="wrapper">
        <div class="banner"><h1>HUST Online Judge</h1></div>
        <?php echo($body); ?>
    </div>
    <?php echo View::factory('footer'); ?>
</div>
</body>
</html>
