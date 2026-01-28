document.addEventListener("DOMContentLoaded", function () {

    function isValidEmail(value) {
        if (!value) return false;

        var atIndex = value.indexOf("@");
        var dotIndex = value.lastIndexOf(".");

        return atIndex > 0 && dotIndex > atIndex + 1;
    }

    function showWarning(message) {
        var warning = document.getElementById("formWarning");
        if (!warning) return;

        warning.textContent = message;
        warning.style.display = "block";
    }

    function clearForm(formId) {
        var form = document.getElementById(formId);
        if (!form) return;

        form.reset();

        var warning = document.getElementById("formWarning");
        if (warning) {
            warning.textContent = "";
            warning.style.display = "none";
        }
    }

    var loginForm = document.getElementById("login-form");

    if (loginForm) {
        loginForm.addEventListener("submit", function (e) {
            e.preventDefault();

            var email = document.getElementById("email").value.trim();
            var password = document.getElementById("loginPassword").value.trim();

            if (!email || !password) {
                showWarning("Please fill in all fields.");
                return;
            }

            if (!isValidEmail(email)) {
                showWarning("Please enter a valid email address.");
                return;
            }

            if (password.length < 6) {
                showWarning("Password must be at least 6 characters.");
                return;
            }

            this.submit();
        });
    }

    var signupForm = document.getElementById("signup-form");

    if (signupForm) {
        signupForm.addEventListener("submit", function (e) {
            e.preventDefault();

            var first = document.getElementById("firstName").value.trim();
            var last = document.getElementById("lastName").value.trim();
            var contact = document.getElementById("contact").value.trim();
            var contactConfirm = document.getElementById("contactConfirm").value.trim();
            var password = document.getElementById("signupPassword").value.trim();
            var passwordConfirm = document.getElementById("signupPasswordConfirm").value.trim();

            if (!first || !last || !contact || !contactConfirm || !password || !passwordConfirm) {
                showWarning("Please fill in all fields.");
                return;
            }

            if (!isValidEmail(contact)) {
                showWarning("Please enter a valid email address.");
                return;
            }

            if (contact !== contactConfirm) {
                showWarning("Email addresses do not match.");
                return;
            }

            if (password.length < 6) {
                showWarning("Password must be at least 6 characters.");
                return;
            }

            if (password !== passwordConfirm) {
                showWarning("Passwords do not match.");
                return;
            }

            alert("Signup successful!!");
            this.submit();
        });
    }

});
