
jQuery(document).ready(function( $ ) {
    $('.popupShowButton').click(function() {
        $('.contact-wrapper').show();
        animate1 = $('.contact-form');
    animate1.addClass('animate-open');
    animate1.one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
        function (e) {
            animate1.removeClass('animate-open');
        });
    });
    $('.popupCloseButton').click(function() {
        $('.contact-wrapper').hide();
    })
    $('.hide').click(function(){
        $('.contact-wrapper').hide();
    })
});
