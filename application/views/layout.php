<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="keyword" content="HUST, 华中科技大学, ACM, freefcw, sempr, online judge, 计算机竞赛, 编程, ICPC"/>
<meta name="description" content="HUST ACM - 华中科技大学ACM组织"/>
<meta name="robots" content="index,follow" />
<title><?php echo $title; ?></title>
<?php echo HTML::style('static/style/style.css');?>
<link rel="shortcut icon" href="favicon.ico" />
</head>
<body>
<div id="nav">
<ul>
<li><?php echo html::anchor('/', 'Home'); ?></li>
<li><?php echo html::anchor('/problem/list', 'Problems'); ?></li>
<li><?php echo html::anchor('/problem/status', 'Status'); ?></li>
<li><?php echo html::anchor('/rank/user', 'Rank'); ?></li>
<li><?php echo html::anchor('/contest', 'Contest'); ?></li>
<li><?php echo html::anchor('/faqs', 'Faqs'); ?></li>
</ul>
<div>
<?php echo $body; ?>
<div id="footer">
<ul>
<li><?php echo html::anchor('about', 'About');?></li>
<li><?php echo html::anchor('links', 'Links');?></li>
<li><?php echo html::anchor('status', 'Status');?></li>
<li><?php echo html::anchor('contact', 'Contact');?></li>
<li><?php echo html::anchor('help', 'Help');?></li>
<li><?php echo html::anchor('term', 'Terms of Service');?></li>
</ul>
<div>Copyright © 2003-2011 <?php echo html::anchor('http://acm.hust.edu.cn', 'HUST ACMICPC TEAM');?>. All rights reserved.</div>
</div></body></html>
