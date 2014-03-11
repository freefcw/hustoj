/**
 * Basic plugin to allow JavaScript subscriptions for Bootsrap 3 responsive switch widths.
 *
 * FROM THE BOOTSTRAP DOCS
 *
 * Extra small devices (phones, up to 480px)
 * No media query since this is the default in Bootstrap
 *
 * Small devices (tablets, 768px and up)
 * @media (min-width: @screen-sm) { ... }
 *
 * Medium devices (desktops, 992px and up)
 * @media (min-width: @screen-md) { ... }
 *
 * Large devices (large desktops, 1200px and up)
 * @media (min-width: @screen-lg) { ... }
 *
 */
(function ($) {

    $.fn.responsive = function () {
        // ref to this object
        var self = this;
        // keep track of the current size. so that 
        // we don't call the hook multiple times
        var currentSize = '';

        // extend the options from pre-defined values:
        var options = $.extend({
            extraSmall: function () { },
            small: function () { },
            medium: function () { },
            large: function () { }
        }, arguments[0] || {});

        // check after the initial load
        checkForResize();

        // check subscriptions when window width changes
        $(window).resize(function () {
            checkForResize();
        });

        // see if subscriptions need to be fired
        function checkForResize() {
            // get the screen width
            var width = $(window).width();

            if (width > 1200) {
                if (currentSize != 'large') {
                    currentSize = 'large';
                    options.large.call(self);
                }
            }
            else if (width > 992) {
                if (currentSize != 'medium') {
                    currentSize = 'medium';
                    options.medium.call(self);
                }
            }
            else if (width > 768) {
                if (currentSize != 'small') {
                    currentSize = 'small';
                    options.small.call(self);
                }
            }
            else if (currentSize != 'extraSmall') {
                currentSize = 'extraSmall';
                options.extraSmall.call(self);
            }
        }
    };

})(jQuery);