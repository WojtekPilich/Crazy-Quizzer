(function($) {

    const loginRegisterForm = $('.login-register');
    const loginRegisterBtn = $('.login-register-btn');

    loginRegisterForm.addClass('hidden');

    loginRegisterBtn.on('click', function(e) {
        // e.preventDefault();
        loginRegisterForm.toggleClass('showed');
    });

    let slider = $('.main-slider');
    slider.slick({
        speed: 900,
        arrows: true,
        dots: true,
        slidesToShow: 1,
        infinite: true,
        centerMode: true,
        autoplay: true,
        autoplaySpeed: 1500,
        mobileFirst: true,
        touchMove: true,
        // variableWidth: true
        // pauseOnFocus: true
        // fade: true,
        // cssEase: 'linear',
        // rtl: true
        // autoplay: true
    });

})(jQuery);

// (function($) {
//
//     // alert('ok');
//     $('.main-slider').slick();
//
// })(jQuery);
