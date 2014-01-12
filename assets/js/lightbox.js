jQuery(document).ready(function($) {
    var current, size;
    $('.lightboxTrigger').click(function(e) {
        e.preventDefault();
        var image_href = $(this).attr("href");
        var slideNum = $('.lightboxTrigger').index(this);
        // find out if #lightbox exists
        if ($('#lightbox').length > 0) {
            $('#lightbox').fadeIn(300);
        } else {
            var lightbox =
                '<div id="lightbox">' +
                    '<div id="slideshow">' +
                    '<div class="lightbox-nav">' +
                    '<a class="prev slide-nav"><</a>' +
                    '<a class="next slide-nav">></a>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
            $('body').append(lightbox);
            $('#imageSet').find('.lightboxTrigger').each(function() {
                var $href = $(this).attr('href');
                $('#slideshow').append(
                    '<img src="' + $href + '">'
                );
            });
        }
        size = $('#slideshow img').length;

        $('#slideshow img').hide();
        $('#slideshow img:eq(' + slideNum + ')').show();
        current = slideNum;
    });

    $('body').on('click', '#lightbox', function() {
        $('#lightbox').fadeOut(300);
    });
    $(document).keyup(function(e) {
        if (e.keyCode == 27) {
            $('#lightbox').fadeOut(300); }
    });
    // show/hide navigation when hovering over #slideshow
    $('body').on(
        { mouseenter: function() {
            $('.lightbox-nav').fadeIn(300);
        }, mouseleave: function() {
            $('.lightbox-nav').fadeOut(300);
        }
        },'#slideshow');

    // navigation prev/next
    $('body').on('click', '.slide-nav', function(e) {
        // prevent default click event, and prevent event bubbling to prevent lightbox from closing
        e.preventDefault();
        e.stopPropagation();

        var $this = $(this);
        var dest;

        if ($this.hasClass('prev')) {
            dest = current - 1;
            if (dest < 0) {
                dest = size - 1;
            }
        } else {
            dest = current + 1;
            if (dest > size - 1) {
                dest = 0;
            }
        }
        $('#slideshow img:eq(' + current + ')').fadeOut(100);
        $('#slideshow img:eq(' + dest + ')').fadeIn(100);
        current = dest;
    });


    $(document.documentElement).keyup(function (event) {
        var $this = $(this);
        var dest;

        if (event.keyCode == 37) {
            dest = current - 1;
            if (dest < 0) {
                dest = size - 1;
            }
        }
        else if (event.keyCode == 39) {
            dest = current + 1;
            if (dest > size - 1) {
                dest = 0;
            }
        }
        $('#slideshow img:eq(' + current + ')').hide();
        $('#slideshow img:eq(' + dest + ')').show();
        current = dest;
    });
});