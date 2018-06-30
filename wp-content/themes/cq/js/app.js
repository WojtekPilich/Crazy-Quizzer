(function($) {

    //login-form
    const userLogin = $('#user_login');
    const loginRegisterForm = $('.login-register');
    const loginRegisterBtn = $('.login-register-btn');
    const dim = $('.dim');

    dim.hide();
    loginRegisterForm.hide();

    loginRegisterBtn.on('click', function(e) {
        loginRegisterForm.show();
        dim.show();
        userLogin.focus();
        $('.main-cnt').toggleClass('overflow');
    });

    dim.on('click', function() {
       $(this).hide();
       loginRegisterForm.hide();
       $('.main-cnt').toggleClass('overflow');

    });

    //slider
    let slider = $('.main-slider');
    slider.slick({
        speed: 1000,
        arrows: true,
        dots: true,
        slidesToShow: 1,
        infinite: true,
        touchMove: true,
        variableWidth: true,
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


