$(document).ready(function() {
    $("#register").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "username": {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            "password": {
                required: true,
                minlength: 8
            },
            "re-password": {
                required: true,
                equalTo: "#password",
                minlength: 8
            },
            "email":{
                required:true,
                email:true,
            },
        }
    });
});
