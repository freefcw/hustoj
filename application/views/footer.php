<div class="footer center-block">
    <ul>
        <li><?php echo HTML::anchor('about', __('footer.about'));?></li>
        <li><?php echo HTML::anchor('links', __('footer.links'));?></li>
        <li><?php echo HTML::anchor('status', __('footer.status'));?></li>
        <li><?php echo HTML::anchor('contact', __('footer.contact'));?></li>
        <li><?php echo HTML::anchor('help', __('footer.help'));?></li>
        <li><?php echo HTML::anchor('terms', __('footer.terms'));?></li>
    </ul>
    <div class="runtime-info">{memory_usage}, {execution_time}</div>
    <p id="copyright"><?php echo(__('footer.copyright_:year_:team_reserved', array(':year'=>date('Y'), ':team'=>e::get_website_team()))); ?></p>
    <p id="copyright"><?php echo(__('footer.power_by_:hustoj', array(':hustoj'=>HTML::anchor('https://github.com/freefcw/hustoj', 'HUSTOJ')))); ?></p>
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
        convert_urls: false,
<?php if (I18n::$lang != 'en-us'): ?>
        language: "<?php echo(I18n::$lang); ?>",
<?php endif; ?>
    });
</script>
<?php endif;?>
