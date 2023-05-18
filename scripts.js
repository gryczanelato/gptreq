//Credentials:
//https://bbbootstrap.com/snippets/bootstrap-login-63670890 
//User: speed freak11


$(function() {
    $(".btn").click(function() {
        $(".form-signin").toggleClass("form-signin-left");
        $(".form-signup").toggleClass("form-signup-left");
        $(".frame").toggleClass("frame-long");
        $(".signup-inactive").toggleClass("signup-active");
        $(".signin-active").toggleClass("signin-inactive");
        $(this).removeClass("idle").addClass("active");
        });
    });
    
    $(function() {
    $(".btn-signup").click(function() {
        $(".form-signup-left").toggleClass("form-signup-down");
        $(".frame").toggleClass("frame-short");
        });
    });
    
    $(function() {
    $(".btn-signin").click(function() {
        $(".frame").toggleClass("frame-short");
        });
    });