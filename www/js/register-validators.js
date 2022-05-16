let pw_val = true;
let check_len_pw = true;
let check_len_fname = true;
let check_len_lname = true;

function resetForm(){
    document.getElementById("signup-form").reset();
    checkEmpty();
    document.querySelector("#check-valid-pass").innerHTML = "";
    document.getElementById("check-password").innerHTML = "";
    document.getElementById("check-fname").innerHTML = "";
    document.getElementById("check-lname").innerHTML = "";
    document.querySelector("#check_email").innerHTML = "";
}
function checkEmpty(){
    let input_email = document.getElementById("email-add").value;
    let input_pass = document.getElementById("password").value;
    let confirm_pass =document.getElementById("password-confirm").value;
    let input_fname = document.getElementById("first-name").value;
    let input_lname = document.getElementById("last-name").value;
    if(!input_email && !input_pass &&!confirm_pass && !input_fname && !input_lname) {
        document.getElementById("reset-button").style.backgroundColor = "grey";
    }else{
        document.getElementById("reset-button").style.backgroundColor = "#0d6efd";
    }
}

// check password
function check_pass() {
    document.querySelector("#password").style.borderBottom = "solid 1px #ccc"; 

    let input_pass = document.getElementById("password").value;
    let confirm_pass = document.getElementById("password-confirm").value;

    let pattern = /^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(.{8,20})$/
    
    // Check password with regrex
    if(input_pass != "") {
        let valid = pattern.test(input_pass);
        if(valid){
            document.querySelector("#check-valid-pass").innerHTML = "Your Password is valid";
        }else{
            
            document.querySelector("#check-valid-pass").innerHTML = "Must contain at least 1 lower case letter, 1 upper case letter, 1 digit, and  8 to 20 characters";
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

function check_confirm_pass(){
        document.querySelector("#password-confirm").style.borderBottom = "solid 1px #ccc";

        let input_pass = document.getElementById("password").value;
        let confirm_pass = document.getElementById("password-confirm").value;

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
    document.querySelector("#first-name").style.borderBottom = "solid 1px #ccc";

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
    document.querySelector("#last-name").style.borderBottom = "solid 1px #ccc";

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

function check_email(){
    document.querySelector("#email-add").style.borderBottom = "solid 1px #ccc";

    let input_email = document.querySelector("#email-add").value;
    //Aligned with RFC 5322
    let pattern = new RegExp("([!#-'*+/-9=?A-Z^-~-]+(\.[!#-'*+/-9=?A-Z^-~-]+)*|\"\(\[\]!#-[^-~ \t]|(\\[\t -~]))+\")@([!#-'*+/-9=?A-Z^-~-]+(\.[!#-'*+/-9=?A-Z^-~-]+)*|\[[\t -Z^-~]*])")
    // email with regrex
    if(input_email != ""){
        let valid = pattern.test(input_email);
        if(valid){
            document.querySelector("#check_email").innerHTML = "Email has valid pattern!";
        }else{
            document.querySelector("#check_email").innerHTML = "Your email is not quite right";
        }
    }
}

function checkResetPassword(event){
    let input_pass = document.getElementById("password").value;
    let confirm_pass =document.getElementById("password-confirm").value;

    if(!input_pass ||!confirm_pass) {
        event.preventDefault();
        alert("Fail to register. \nPlease fill in the blanks.");
        if(!input_pass){
            document.querySelector("#password").style.borderColor = "red"; 
        }
        if(!confirm_pass){
            document.querySelector("#password-confirm").style.borderColor = "red";
        }
    }
}

// if there are any blanks or any invalid information, register will be rejected.
async function check_signup(event) {
    let input_email = document.getElementById("email-add").value;
    let input_pass = document.getElementById("password").value;
    let confirm_pass =document.getElementById("password-confirm").value;
    let input_fname = document.getElementById("first-name").value;
    let input_lname = document.getElementById("last-name").value;

    if(!input_email || !input_pass ||!confirm_pass || !input_fname || !input_lname) {
        event.preventDefault();
        alert("Fail to register. \nPlease fill in the blanks.");
        if(!input_email){
            document.querySelector("#email-add").style.borderBottom = "solid 1px red"; 
        }
        if(!input_pass){
            document.querySelector("#password").style.borderBottom = "solid 1px red"; 
        }
        if(!confirm_pass){
            document.querySelector("#password-confirm").style.borderBottom = "solid 1px red";
        }
        if(!input_fname){
            document.querySelector("#first-name").style.borderBottom = "solid 1px red";
        }
        if(!input_lname){
            document.querySelector("#last-name").style.borderBottom = "solid 1px red";
        }
    }
}