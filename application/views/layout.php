<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="keyword" content="HUST, 华中科技大学, ACM, freefcw, sempr, online judge, 计算机竞赛, 编程, ICPC"/>
<meta name="description" content="HUST ACM - 华中科技大学ACM组织"/>
<meta name="robots" content="index,follow" />
<title><?php echo $title; ?></title>
<?php echo HTML::style('static/style/style.css');?>
<?php echo HTML::script(' https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'); ?>
<?php echo HTML::script('http://twitter.github.com/bootstrap/1.4.0/bootstrap-dropdown.js'); ?>
<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css">
<link rel="shortcut icon" href="favicon.ico" />
<script type="text/javascript">
    $('.userinfo').dropdown();
</script>
</head>
<body>
<div class="container">
<ul class="tabs" style="width: 72%;float: left">
<li><?php echo html::anchor('/', 'Home'); ?></li>
<li><?php echo html::anchor('/problem/list', 'Problems'); ?></li>
<li><?php echo html::anchor('/problem/status', 'Status'); ?></li>
<li><?php echo html::anchor('/rank/user', 'Rank'); ?></li>
<li><?php echo html::anchor('/contest', 'Contest'); ?></li>
<li><?php echo html::anchor('/faqs', 'Faqs'); ?></li>
<li><?php echo html::anchor('#', 'Discuss'); ?></li>
</ul>
    <?php if ($current_user == null): ?>
<ul class="tabs userinfo" style="width: 14%;padding-left: 14%">
    <li><a href="/login">Login</a></li>
    <?php else: ?>
<ul class="tabs userinfo" style="width: 28%;">
    <li><a href="/user/<?php echo $current_user;?>" title="<?php echo $current_user;?>">My Profile</a></li>
    <li><a href="#">Message</a></li>
    <?php endif;?>
    <li class="dropdown" data-dropdown="dropdown">
    <a href="#" class="dropdown-toggle">More</a>
    <ul class="dropdown-menu">
      <li><a href="/setting">Setting</a></li>
      <li><a href="/logout">Logout</a></li>
    </ul>
    </li>
</ul>
<div id="wrapper">
<div class="banner"><h1>HUST Online Judge</h1></div>
<?php echo $body; ?>
</div>
<div id="footer">
<ul>
<li><?php echo html::anchor('about', 'About');?></li>
<li><?php echo html::anchor('links', 'Links');?></li>
<li><?php echo html::anchor('status', 'Status');?></li>
<li><?php echo html::anchor('contact', 'Contact');?></li>
<li><?php echo html::anchor('help', 'Help');?></li>
<li><?php echo html::anchor('terms', 'Terms of Service');?></li>
</ul>
<p id="copyright">Copyright © 2003-2011 <?php echo html::anchor('http://acm.hust.edu.cn', 'HUST ACMICPC TEAM');?>. All rights reserved.</p>
</div>
</div>
</body></html>
