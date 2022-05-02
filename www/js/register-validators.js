let pw_val = true;
let check_len_pw = true;
let check_len_fname = true;
let check_len_lname = true;

// check password
function check_pass() {
    let input_pass = document.getElementById("password").value;
    let confirm_pass = document.getElementById("password-confirm").value;
    let len_pass = document.getElementById("password").value.length;

    if(input_pass != "") {
        if(len_pass < 8 || len_pass > 20) {
            document.getElementById("check-pw-len").innerHTML = "Password must be from 8 to 20 characters.";
            check_len_pw = false;
        } else {
            document.getElementById("check-pw-len").innerHTML = "Perfect!";
            check_len_pw = true;
        }
    }

    // if rechecking is wrong
    if(input_pass != "" && confirm_pass != ""){
        if(input_pass === confirm_pass){
            document.getElementById("check-password").innerHTML = "Password matches!";
            pw_val = true;
        } else if(input_pass !== confirm_pass) {
            document.getElementById("check-password").innerHTML = "Password doesn't match. Try again.";
            pw_val = false;
        }
    }
}

// check first name(length)
function check_fname() {
    let input_fname = document.getElementById("first-name").value;
    let len_fname = document.getElementById("first-name").value.length;

    if(input_fname != "") {
        if(len_fname < 2 || len_fname > 20) {
            document.getElementById("check-fname").innerHTML = "First name must be from 2 to 20 characters.";
            check_len_fname = false;
        } else {
            document.getElementById("check-fname").innerHTML = "Perfect!";
            check_len_fname = true;
        }
    }
}

// check last name(length)
function check_lname() {
    let input_lname = document.getElementById("last-name").value;
    let len_lname = document.getElementById("last-name").value.length;

    if(input_lname != "") {
        if(len_lname < 2 || len_lname > 20) {
            document.getElementById("check-lname").innerHTML = "Last name must be from 2 to 20 characters.";
            check_len_lname = false;
        } else {
            document.getElementById("check-lname").innerHTML = "Perfect!";
            check_len_lname = true;
        }
    }
}

// if there are any blanks or any invalid information, register will be rejected.
async function check_signup() {
    if(!document.getElementById("email-ad").value || !document.getElementById("password").value ||!document.getElementById("password-confirm").value || !document.getElementById("first-name").value || !document.getElementById("last-name").value) {
        alert("Fail to register. \nPlease fill in the blanks.");
    }
}