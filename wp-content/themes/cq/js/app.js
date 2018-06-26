(function($) {

    //login-form
    const loginRegisterForm = $('.login-register');
    const loginRegisterBtn = $('.login-register-btn');
    const dim = $('.dim');

    dim.hide();
    loginRegisterForm.hide();

    loginRegisterBtn.on('click', function(e) {
        // e.preventDefault();
        loginRegisterForm.show();
        dim.show();
    });

    dim.on('click', function() {
       $(this).hide();
       loginRegisterForm.hide();
    });

    //slider
    let slider = $('.main-slider');
    slider.slick({
        speed: 1000,
        arrows: true,
        dots: true,
        slidesToShow: 1,
        infinite: true,
        // centerMode: true,
        // autoplay: true,
        // autoplaySpeed: 1500,
        // mobileFirst: true,
        touchMove: true,
        variableWidth: true,
        // adaptiveHeight: true,
        // pauseOnFocus: true
        // fade: true,
        // cssEase: 'linear',
        // rtl: true
        // autoplay: true
        // centerPadding: '20px'
    });

    let sliderTit = $('.slider-title');
    let sliderImg = $('.slider-img');

    sliderTit.hide();

    sliderImg.on('mouseenter', function(e) {
        $(this).prev().show();
    });
    sliderImg.stopImmediatePropagation();

    sliderImg.on('mouseleave', function(e) {
        $(this).prev().hide();
    });



})(jQuery);


