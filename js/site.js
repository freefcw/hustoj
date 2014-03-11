$(function(){
    $('#select-all-topic').click(function(){
        if ( $(this).prop('checked') )
        {
            $('input[type=checkbox]').each(function(){
                $(this).prop('checked', 'checked');
            });
        } else {
            $('input[type=checkbox]').each(function(){
                $(this).prop('checked', false);
            });
        }
    });
    $('input[type=checkbox]').each(function(){
        $(this).click(function(){
            if ( !$(this).prop('checked') )
            {
                $('#select-all-topic').prop('checked', false);
            }
        });
    })
})