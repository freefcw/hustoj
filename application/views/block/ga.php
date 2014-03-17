<?php $gacode = Model_Option::get_option('ga_code', 'UA-6733942-1');
if ( isset($gacode) ):?>
<script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();
        var scripts = s.getElementsByTagName(o);
        var already_have = false;
        for (var index = 0; index < scripts.length; index++)
        {
            try {
                if ( scripts[index].src.indexOf(g) >= 0 ) {
                    already_have = true;
                }
            } catch (e){}
        }
        if ( ! already_have )
        {
            a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        }
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '<?php echo $gacode;?>', '<?php echo Model_Option::get_option('domain');?>');
    ga('send', 'pageview');
</script>
<?php endif;?>
