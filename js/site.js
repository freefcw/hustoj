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

$(document).ready(function () {
    $('body').responsive({
        extraSmall: function() {
            // complicated JavaScript here for extra small screens
            $('.nav-controls').removeClass('pull-right');
        },
        small: function() {
            // complicated JavaScript here for small screens
            var control = $('.nav-controls');
            if ( ! control.hasClass('pull-right'))
            {
                control.addClass('pull-right')
            }
            $('.home').hide();
        },
        medium: function() {
            // complicated JavaScript here for medium screens
            $('.home').show();
        },
        large: function() {
            // complicated JavaScript here for large screens
        },
    });
});

$(function(){
    $('#problem-desc img').each(function(){
        var elem = $(this);
        var origin_src = elem.attr('src');

        if ( origin_src[0] == '/' && base_url != '/' )
        {
            var new_src = base_url + origin_src.substring(1);
            elem.attr('src', new_src);
        }
    });
});
