<div class="footer center-block">
    <ul>
        <li><?php echo HTML::anchor('about', 'About');?></li>
        <li><?php echo HTML::anchor('links', 'Links');?></li>
        <li><?php echo HTML::anchor('status', 'Status');?></li>
        <li><?php echo HTML::anchor('contact', 'Contact');?></li>
        <li><?php echo HTML::anchor('help', 'Help');?></li>
        <li><?php echo HTML::anchor('terms', 'Terms of Service');?></li>
    </ul>
    <div class="runtime-info">{memory_usage}, {execution_time}</div>
    <p id="copyright">Copyright © 2003 - <?php echo(date('Y'));?> <?php echo HTML::anchor('http://acm.hust.edu.cn', 'HUST ACMICPC TEAM');?>. All rights reserved.</p>
</div>
<?php echo View::factory('block/ga');?>