//FUNCTION FOR CHANGING DIV DATA TO FILE NAME
let input = document.getElementById("profile_input");
let file = document.getElementById("file_name");

input.addEventListener("change",() => {
    file.innerHTML = input.files[0].name;
});

let valid = document.getElementById("valid");
let file_valid = document.getElementById("file_valid");

valid.addEventListener("change",() => {
    file_valid.innerHTML = valid.files[0].name;
});

let business_permit = document.getElementById("business_permit");
let file_business = document.getElementById("file_business");

business_permit.addEventListener("change",() => {
    file_business.innerHTML = business_permit.files[0].name;
});

let resume = document.getElementById("resume");
let file_cv = document.getElementById("file_cv");

resume.addEventListener("change",() => {
    file_cv.innerHTML = resume.files[0].name;
});

//FUNCTION FOR CONTACT NUMBER LENGTH
let contact_number = document.getElementById("contact_number");
contact_number.addEventListener("input", function (){
    let value = this.value.trim();
    if(value.length > 11){
        this.value = value.slice(0,11);
    }
});

//FUNCTION FOR WRONG PASSWORD
function check(){
    let password = document.getElementById("password").value;
    let confirm_password = document.getElementById("confirm_password").value;
    let lastmail = "@gmail.com";
    let email = document.getElementById("email").value;
    let profile_input = document.getElementById("profile_input").value; 
    let valid = document.getElementById("valid").value; 
    let business_permit = document.getElementById("business_permit").value; 
    let resume = document.getElementById("resume").value; 
    let upload_form = document.getElementById("upload_form");
    let contact_number = document.getElementById("contact_number").value;

    var wrong_pass = document.getElementById("wrong_pass");
    var container = document.getElementById("container");
    var wrong_email = document.getElementById("wrong_email");
    var empty = document.getElementById("empty"); 
    var contact = document.getElementById("contact"); 
   

    if(password !== confirm_password){
        wrong_pass.classList.add("wrong_pass-open");
        container.classList.add("container-main");
    }
    else if(!email.endsWith(lastmail)){
        wrong_email.classList.add("wrong_email-open");
        container.classList.add("container-main");
    }
    else if(profile_input == '' || valid == '' || business_permit == '' || resume == ''){
        empty.classList.add("wrong-empty");
        container.classList.add("container-main");
    }
    else if(contact_number.length < 11){
        contact.classList.add("wrong-contact");
        container.classList.add("container-main");
    }
    else{
        upload_form.click();
    }
}

function remove(){
    wrong_pass.classList.remove("wrong_pass-open");
    wrong_email.classList.remove("wrong_email-open");
    empty.classList.remove("wrong-empty");
    contact.classList.remove("wrong-contact");
    container.classList.remove("container-main");
}

