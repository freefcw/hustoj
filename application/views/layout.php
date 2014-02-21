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
    <link rel="stylesheet" href="/css/nprogress.css">
    <link rel="stylesheet" href="/js/code/prettify.css">
    <link type="text/css" href="/css/ui-lightness/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />
    <script type="text/javascript" src="/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="/js/jquery.turbolinks.js"></script>
    <script type="text/javascript" src="/js/page.js" data-turbolinks-eval="true"></script>
    <script type="text/javascript" src="/js/code/prettify.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui-1.10.3.custom.js"></script>
    <script type="text/javascript" src="/js/turbolinks.js"></script>
    <script type="text/javascript" src="/js/nprogress.js"></script>
    <link rel="shortcut icon" href="/favicon.ico"/>
</head>
<body>
<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">HUSTACM</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php if (Request::$current->controller() == 'Index' AND Request::$current->action() == 'index'):?>class="active" <?php endif;?>><a href="/">Home</a></li>
                <li <?php if (Request::$current->controller() == 'Problem'):?>class="active" <?php endif;?>><a href="/problem/list">Problem</a></li>
                <li <?php if (Request::$current->controller() == 'Solution' AND Request::$current->action() == 'status'):?>class="active" <?php endif;?>><a href="/status">Status</a></li>
                <li <?php if (Request::$current->controller() == 'User' AND Request::$current->action() == 'list' ):?>class="active" <?php endif;?>><a href="/rank/user">Rank</a></li>
                <li <?php if (Request::$current->controller() == 'Contest'):?>class="active" <?php endif;?>><a href="/contest">Contest</a></li>
                <li <?php if (Request::$current->action() == 'faqs'):?>class="active" <?php endif;?>><a href="/faqs">Faqs</a></li>
                <li <?php if (Request::$current->controller() == 'Discuss'):?>class="active" <?php endif;?>><a href="/discuss">Discuss</a></li>
            </ul>

            <ul class="nav navbar-nav pull-right">
                <?php $cu = Auth::instance()->get_user(); if ( $cu == null): ?>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/user/register">Register</a></li>
                <?php else: ?>
                <li <?php if (Request::$current->controller() == 'User' AND Request::$current->action() == 'profile' ):?>class="active" <?php endif;?>><a href="<?php echo(Route::url('profile', array('uid' => $cu->user_id)));?>"
                       title="<?php echo($cu->user_id);?>"><?php echo($cu->user_id);?></a></li>
                <li <?php if (Request::$current->controller() == 'User' AND Request::$current->action() == 'edit' ):?>class="active" <?php endif;?>><a href="/user/edit">Setting</a></li>
                <li class="divider-vertical"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/mail">Message</a></li>
                        <?php if ( OJ::is_admin() ): ?>
                            <li><a href="/admin" data-no-turbolink>Admin Control</a></li>
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
</div>
<?php echo(View::factory('footer')); ?>
</body>
</html>
