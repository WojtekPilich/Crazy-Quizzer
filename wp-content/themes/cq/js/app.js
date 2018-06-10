// document.addEventListener("DOMContentLoaded", function () {
//
//    alert('działa');
//     let answers = document.querySelectorAll('.quiz-body li');
//     console.log(answers);
//
//     let txt = document.querySelector(".text");
//     console.log(text);
//
//     let hidden = document.querySelector("");
// });
(function($) {

    // alert('działa');
    let hidden = $('.hidden').text();
    console.log('hidden = ' + hidden);

    let answers = $('.answer');
    console.log('answers = ' + answers);

    answers.on('click', function(e) {
        e.preventDefault();
        if(hidden.indexOf($(this).text()) !== -1) {
            alert('zaznaczyłeś prawidłową odpowiedź');
        }

    })


})( jQuery );

