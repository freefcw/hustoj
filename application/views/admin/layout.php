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
    <link rel="stylesheet" href="/css/ui-lightness/jquery-ui-1.10.3.custom.min.css">
    <script type="text/javascript" src="/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="/js/page.js"></script>
    <script type="text/javascript" src="/js/jquery-ui-1.10.3.custom.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<body>

<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/admin">ADMIN</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php if (Request::$current->controller() == 'Index'):?>class="active" <?php endif;?>><a href="/admin">Home</a></li>
                <li <?php if (Request::$current->controller() == 'Problem'):?>class="active" <?php endif;?>><a href="/admin/problem">Problem</a></li>
                <li <?php if (Request::$current->controller() == 'User'):?>class="active" <?php endif;?>><a href="/admin/user">User</a></li>
                <li <?php if (Request::$current->controller() == 'Contest'):?>class="active" <?php endif;?>><a href="/admin/contest">Contest</a></li>
                <li <?php if (Request::$current->controller() == 'News'):?>class="active" <?php endif;?>><a href="/admin/news">News</a></li>
                <li <?php if (Request::$current->controller() == 'Setting'):?>class="active" <?php endif;?>><a href="/admin/setting">Configure</a></li>
                <li <?php if (Request::$current->controller() == 'Discuss'):?>class="active" <?php endif;?>><a href="#">Discuss</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li><a href="<?php echo(Route::url('profile', array('uid' => $current_user->user_id)));?>"
                       title="<?php echo($current_user->user_id);?>"><?php echo($current_user->user_id);?></a></li>
                <li class="divider-vertical"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/mail">Message</a></li>
                        <li class="divider"></li>
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-1 sidebar">
            <?php echo View::factory('admin/'. strtolower(Request::current()->controller()).'/sidebar');?>
        </div>
        <div class="col-md-11">
            <h3><?php echo $title;?></h3>
            <?php if (isset($message) && $message):?>
                <?php echo View::factory('admin/message', array('message' => $message ));?>
            <?php endif;?>
            <?php if (Session::instance()->get('flashed_message')):?>
                <?php echo View::factory('admin/message', array('message' => Session::instance()->get_once('flashed_message') ));?>
            <?php endif;?>
            <?php echo($body); ?>
        </div>
    </div>
    <?php echo(View::factory('footer')); ?>
</div>
</body>
</html>
