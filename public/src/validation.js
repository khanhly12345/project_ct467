$().ready(function() {
    $(".form-reg").validate({
        rules: {
            fullname: "required",
            password: "required",
            username: "required",
        },
        messages: {
            fullname:  "Please enter your fullname",
            password: "Please enter your password",
            username: "Please enter your username",
        }
        ,
        submitHandler: function(form) {
          form.submit();
        }
    });
    $(".form-login").validate({
        rules: {
            password: "required",
            username: "required",
        },
        messages: {
            password: "Please enter your password",
            username: "Please enter your username",
        }
        ,
        submitHandler: function(form) {
          form.submit();
        }
    });
})