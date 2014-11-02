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
    });
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
    $(".submit textarea").keydown(function(e) {
        var $this, end, start;
        var tabcode = 9;
        if (e.keyCode === tabcode) {
            start = this.selectionStart;
            $this = $(this);
            $this.val($this.val().substring(0, start) + "\t" + $this.val().substring(start));
            this.selectionStart = this.selectionEnd = start + 1;
            if(e.preventDefault) {
                e.preventDefault();
            }
            return false;
        }
    });
    $('.detail img').each(function(){
        var elem = $(this);
        var origin_src = elem.attr('src');

        if ( origin_src[0] == '/' && base_url != '/' )
        {
            var new_src = base_url + origin_src.substring(1);
            elem.attr('src', new_src);
        }
        if ( origin_src[0] != '/' )
        {
            elem.attr('src', base_url + origin_src);
        }
    });

    $('.needit').each(function(){
        var div = $(this);
        var elem = div.find('.form-control');
        elem.focusout(function () {
            if ( elem.val().trim() == '' )
            {
                div.addClass('has-error');
            } else {
                div.removeClass('has-error');
            }
        });
    })

    $('form').submit(function(){
        var is_ok = true;
        $(this).find('.needit').each(function(){
            var wrapper =  $(this);
            wrapper.find('.form-control').each(function(){
                if ( $(this).val().trim() == '' )
                {
                    wrapper.addClass('has-error');
                    is_ok = false;
                } else {
                    wrapper.removeClass('has-error');
                }
            })
        });
        return is_ok;
    })
})
