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
    <p id="copyright">Copyright &copy; <?php echo(date('Y'));?> <?php echo(e::get_website_team()); ?>. All rights reserved.</p>
    <p id="copyright">Powered by <?php echo(HTML::anchor('https://github.com/freefcw/hustoj', 'HUSTOJ'));?> Project.</p>
</div>
<?php echo View::factory('block/ga');?>
<?php if (OJ::is_backend()):?>
<script type="text/javascript">
    tinymce.init({
        plugins: "image link code",
        selector: ".tinymce",
        menubar: false,
        toolbar: "undo redo | styleselect fontselect | bold italic | bullist numlist | link image | code",
        statusbar: false,
    });
</script>
<?php endif;?>
