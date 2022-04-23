/**
 * Validates information passed by the user form.
 * @returns false if any error is found in validation.
 */
function validateRegistration() {
    // if the first and last names contain a number.
    x = document.forms["registerForm"]["Fname"].value;
    y = document.forms["registerForm"]["Lname"].value;
    if ((/\d/g.test(x))) {
        alert("First name must only contain letters.");
        return false;
    } else if ((/\d/g.test(y))) {
        alert("Last name must only contain letters");
        return false;
    }

    // if the email was entered correctly.
    x = document.forms["registerForm"]["email"].value;
    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(x))) {
        alert("Email must be filled out correctly.");
        return false;
    }

    // if the phone number isn't 10 digits and contains letters.
    x = document.forms["registerForm"]["phone"].value;
    if (x.length != 10 && !(/[a-zA-Z]/.test(x))) {
        alert("Invalid Phone Number.");
        return false;
    }

    // if the passwords match
    x = document.forms["registerForm"]["password"].value;
    y = document.forms["registerForm"]["cpassword"].value;
    if (!x.localeCompare(y)) {
        alert("Passwords do not match.");
        return false;
    }

    return true; // if validation passes.
} // validateRegistration