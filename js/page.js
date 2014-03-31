$(function(){
    $(document).on('page:fetch',   function() { NProgress.start(); });
    $(document).on('page:change',  function() {
        NProgress.done();
        // rebind the make sure event
        $('.make-sure').click(function(){
            return confirm('ARE U SURE???')
        })
    });
    $(document).on('page:restore', function() { NProgress.remove(); });
});
