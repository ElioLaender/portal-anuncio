$(window).scroll(function (e) {
    var height = $(window).scrollTop();
    var available = $(document).height();
    var percentage_of_page = 0.06;
    var half_screen = available * percentage_of_page;
    if ( height > half_screen ) {
        $('.scrol').css({
            left:'0',
            position:'relative',
            opacity:'1'
        });
        $('.scrol').removeClass('scrol');  

        $('div.contextCur div:last-of-type').fadeIn(1000);
        $('div.controlaAlt').hide();
        $('div.gradient').fadeOut(500);
    } 
});