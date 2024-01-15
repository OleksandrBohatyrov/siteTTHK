$(function() {
    $(".hamburger").click(function(){
        $(this).toggleClass("is-active");

        if($(this).hasClass('is-active')) {
            $('.mnu_top').slideDown(300);
        }else{
            $('.mnu_top').slideUp(300);
        }
    });

    $(document).on('click', function(event) {
        if ($('.hamburger').hasClass('is-active') &&
            (!$('.hamburger').is(event.target) && !$('.mnu_top').is(event.target) &&
                $('.hamburger').has(event.target).length === 0 && $('.mnu_top').has(event.target).length === 0)) {
            $('.mnu_top').slideUp(300);
            $('.hamburger').removeClass("is-active");
        }
    });
});