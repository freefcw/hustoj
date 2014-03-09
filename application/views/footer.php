<div class="footer center-block">
    <ul>
        <li><?php e::anchor('about', 'About');?></li>
        <li><?php e::anchor('links', 'Links');?></li>
        <li><?php e::anchor('status', 'Status');?></li>
        <li><?php e::anchor('contact', 'Contact');?></li>
        <li><?php e::anchor('help', 'Help');?></li>
        <li><?php e::anchor('terms', 'Terms of Service');?></li>
    </ul>
    <div class="runtime-info">{memory_usage}, {execution_time}</div>
    <p id="copyright">Copyright © 2003 - <?php echo(date('Y'));?> <?php e::anchor('http://acm.hust.edu.cn', 'HUST ACMICPC TEAM');?>. All rights reserved.</p>
</div>
<?php echo View::factory('block/ga');?>