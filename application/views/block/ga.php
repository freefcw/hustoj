<?php $ga_code = Model_Option::get_option('ga_code');
if (isset($ga_code)):?>
<script type="text/javascript" data-turbolinks-eval=false>
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript" data-turbolinks-eval=false>
    try {
        var ga_code  = '<?php echo($ga_code);?>';
        var pageTracker = _gat._getTracker(ga_code);
        pageTracker._trackPageview();
    } catch(err) {}
</script>
<?php endif;?>