$(document).ready(function () {
    $('#registrationForm').validate({
        rules: {
            username: {
                required: true,
                minlength: 5,
                validUsername: true
            },
            name: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                validPassword: true
            },
            confirmPassword: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            username: {
                required: "Please enter a username",
                minlength: "Username must be at least 5 characters",
                validUsername: "Invalid username format. Please use only letters, numbers, '-', or '_'"
            },
            name: "Please enter your name",
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email"
            },
            password: {
                required: "Please enter a password",
                validPassword: "Password must contain at least one uppercase letter and have a minimum length of 8 characters"
            },
            confirmPassword: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            }
        },
        errorClass: "error-message", 
        errorElement: "div", 
    });
    $('#loginForm').validate({
        rules: {
            username: {
                required: true,
                validUsername: true
            },
            password: {
                required: true,
            }
        },
        messages: {
            username: {
                required: "Please enter a username",
                validUsername: "Invalid username format. Please use only letters, numbers, '-', or '_'"
            },
            password: {
                required: "Please enter a password"
            }
        },
        errorClass: "error-message", 
        errorElement: "div", 
    });
    // Adding custom validation methods
    $.validator.addMethod("validUsername", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9_-]+$/.test(value);
    });

    $.validator.addMethod("validPassword", function(value, element) {
        return this.optional(element) || /^(?=.*[A-Z]).{8,}$/.test(value);
    });
});

