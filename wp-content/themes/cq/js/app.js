(function($) {

    const loginRegisterForm = $('.login-register');
    const loginRegisterBtn = $('.login-register-btn');

    loginRegisterForm.addClass('hidden');

    loginRegisterBtn.on('click', function(e) {
        // e.preventDefault();
        loginRegisterForm.toggleClass('showed');
    })

})(jQuery);

