<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="keyword" content="HUST, 华中科技大学, ACM, freefcw, sempr, online judge, 计算机竞赛, 编程, ICPC"/>
    <meta name="description" content="HUST ACM - 华中科技大学ACM组织"/>
    <meta name="robots" content="index,follow"/>
    <title><?php echo($title); ?></title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/js/code/prettify.css">
    <link type="text/css" href="/css/ui-lightness/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />
    <script type="text/javascript" src="/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="/js/code/prettify.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui-1.10.3.custom.js"></script>
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<body>
<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">HUSTACM</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><!--class="active"--><a href="/">Home</a></li>
                <li><a href="/problem/list">Problems</a></li>
                <li><a href="/status">Status</a></li>
                <li><a href="/rank/user">Rank</a></li>
                <li><a href="/contest">Contest</a></li>
                <li><a href="/faqs">Faqs</a></li>
                <li><a href="/discuss">Discuss</a></li>
            </ul>

            <ul class="nav navbar-nav pull-right">
                <?php $cu = Auth::instance()->get_user(); if ( $cu == null): ?>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/user/register">Register</a></li>
                <?php else: ?>
                <li><a href="<?php echo(Route::url('profile', array('uid' => $cu->user_id)));?>"
                       title="<?php echo($cu->user_id);?>"><?php echo($cu->user_id);?></a></li>
                <li><a href="/user/edit">Setting</a></li>
                <li class="divider-vertical"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
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
        </div><!--/.nav-collapse -->
    </div>
</div>
<div class="container">
    <?php echo($body); ?>
    <?php echo(View::factory('footer')); ?>
</div>
</body>
</html>
