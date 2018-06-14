(function($) {

    //create variables from elements
    const answers = $('.answer');

    //user click event
    answers.on('click', function(e) {
        e.preventDefault();

        if($(this).attr("data-id")==="correct") {
            $(this).find('button').addClass('correct');
        }
    })


})( jQuery );

