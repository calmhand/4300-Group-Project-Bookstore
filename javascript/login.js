/**
 * Validate user input for site
 * @returns false if error is found in validation
 */
function validateLoginForm() {
    // if email field isn't entered correctly.
    let x = document.forms["loginForm"]["email"].value;
    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(x))) {
      alert("Email must be filled out correctly.");
      return false;
    }

    // if password field is empty.
    x = document.forms["loginForm"]["password"].value;
    if (x = "") {
        alert("Password must be filled out.");
        return false;
    }

    return true;
} // validateLoginForm