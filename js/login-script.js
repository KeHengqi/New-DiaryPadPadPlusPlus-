$(function () {
    $('body').backstretch([
        './img/login-bg.jpg'
    ])
})

$(document).ready(function () {
    $('#register-link').click(function (e) { 
        e.preventDefault();
        $(location).attr('href', './main-page.html');
    }); 
    $('#lost-password-link').click(function (e) { 
        e.preventDefault();
        $(location).attr('href', 'http://www.baidu.com');
    });
    $('#view-as-guest-button').click(function (e) { 
        e.preventDefault();
        $(location).attr('href', './main-page.html');
    });
});

