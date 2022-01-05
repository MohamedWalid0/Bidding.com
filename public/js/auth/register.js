

let nameLable =document.getElementById("nameLable") ;
let phoneLable =document.getElementById("phoneLable") ;
let emailLable =document.getElementById("emailLable") ;
let passwordLable =document.getElementById("passwordLable") ;
let confirmPasswordLable =document.getElementById("confirmPasswordLable") ;

let addressLable =document.getElementById("addressLable") ;


let nameInput = document.getElementById("nameInput") ;
let phoneInput = document.getElementById("phoneInput") ;
let emailInput = document.getElementById("emailInput") ;
let passwordInput = document.getElementById("passwordInput") ;
let confirmPasswordInput = document.getElementById("confirmPasswordInput") ;

let addressInput = document.getElementById("addressInput") ;




nameInput.onfocus = function () {
    nameLable.classList.remove('LableNonActive') ;
    nameLable.classList.add('LableActive') ;

    nameInput.classList.remove('textNonActive') ;
    nameInput.classList.add('textActive') ;

}
nameInput.onblur = function () {
    nameLable.classList.add('LableNonActive') ;
    nameLable.classList.remove('LableActive') ;

    nameInput.classList.remove('textActive') ;
    nameInput.classList.add('textNonActive') ;

}

nameInput.onkeyup = function(){
    var letters = /^[a-zA-Z]{4,}(?: [a-zA-Z]+){0,2}$/;
    if (  ( !nameInput.value.match(letters)) ){
        nameInput.style.borderColor = "red" ;
        nameInput.style.borderWidth = "3px" ;
        nameInput.style.boxShadow = "1px 1px 10px red" ;

    }
    else{
        nameInput.style.borderColor = "#B2B9DC" ;
        nameInput.style.borderWidth = "0.1px" ;
        nameInput.style.boxShadow = "none" ;


    }
}










phoneInput.onfocus = function () {
    phoneLable.classList.remove('LableNonActive') ;
    phoneLable.classList.add('LableActive') ;

    phoneInput.classList.remove('textNonActive') ;
    phoneInput.classList.add('textActive') ;
}
phoneInput.onblur = function () {
    phoneLable.classList.add('LableNonActive') ;
    phoneLable.classList.remove('LableActive') ;

    phoneInput.classList.remove('textActive') ;
    phoneInput.classList.add('textNonActive') ;

}

phoneInput.onkeyup = function(){
    var letters = /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/;
    if (  ( !phoneInput.value.match(letters)) ){
        phoneInput.style.borderColor = "red" ;
        phoneInput.style.borderWidth = "3px" ;
        phoneInput.style.boxShadow = "1px 1px 10px red" ;

    }
    else{
        phoneInput.style.borderColor = "#B2B9DC" ;
        phoneInput.style.borderWidth = "0.1px" ;
        phoneInput.style.boxShadow = "none" ;



    }
}






emailInput.onfocus = function () {
    emailLable.classList.remove('LableNonActive') ;
    emailLable.classList.add('LableActive') ;

    emailInput.classList.remove('textNonActive') ;
    emailInput.classList.add('textActive') ;
}
emailInput.onblur = function () {
    emailLable.classList.add('LableNonActive') ;
    emailLable.classList.remove('LableActive') ;

    emailInput.classList.remove('textActive') ;
    emailInput.classList.add('textNonActive') ;
}

emailInput.onkeyup = function(){
    var letters = /\S+@\S+\.\S+/;
    if (  ( !emailInput.value.match(letters)) ){
        emailInput.style.borderColor = "red" ;
        emailInput.style.borderWidth = "3px" ;
        emailInput.style.boxShadow = "1px 1px 10px red" ;


    }
    else{
        emailInput.style.borderColor = "#B2B9DC" ;
        emailInput.style.borderWidth = "0.1px" ;
        emailInput.style.boxShadow = "none" ;



    }
}




passwordInput.onfocus = function () {
    passwordLable.classList.remove('LableNonActive') ;
    passwordLable.classList.add('LableActive') ;

    passwordInput.classList.remove('textNonActive') ;
    passwordInput.classList.add('textActive') ;
}
passwordInput.onblur = function () {
    passwordLable.classList.add('LableNonActive') ;
    passwordLable.classList.remove('LableActive') ;

    passwordInput.classList.remove('textActive') ;
    passwordInput.classList.add('textNonActive') ;
}



confirmPasswordInput.onfocus = function () {
    confirmPasswordLable.classList.remove('LableNonActive') ;
    confirmPasswordLable.classList.add('LableActive') ;

    confirmPasswordInput.classList.remove('textNonActive') ;
    confirmPasswordInput.classList.add('textActive') ;
}
confirmPasswordInput.onblur = function () {
    confirmPasswordLable.classList.add('LableNonActive') ;
    confirmPasswordLable.classList.remove('LableActive') ;

    confirmPasswordInput.classList.remove('textActive') ;
    confirmPasswordInput.classList.add('textNonActive') ;
}






passwordInput.onkeyup = function(){
    var letters = /^.{4,8}$/
    if (  ( !passwordInput.value.match(letters)) ){
        passwordInput.style.borderColor = "red" ;
        passwordInput.style.borderWidth = "3px" ;
        passwordInput.style.boxShadow = "1px 1px 10px red" ;


    }
    else{
        passwordInput.style.borderColor = "#B2B9DC" ;
        passwordInput.style.borderWidth = "0.1px" ;
        passwordInput.style.boxShadow = "none" ;



    }
}





addressInput.onfocus = function () {
    addressLable.classList.remove('LableNonActive') ;
    addressLable.classList.add('LableActive') ;

    addressInput.classList.remove('textNonActive') ;
    addressInput.classList.add('textActive') ;
}
addressInput.onblur = function () {
    addressLable.classList.add('LableNonActive') ;
    addressLable.classList.remove('LableActive') ;

    addressInput.classList.remove('textActive') ;
    addressInput.classList.add('textNonActive') ;
}


addressInput.onkeyup = function(){
    var letters = /^\d+\s[A-z]+\s[A-z]+/;
    if (  ( !addressInput.value.match(letters)) ){
        addressInput.style.borderColor = "red" ;
        addressInput.style.borderWidth = "3px" ;
        addressInput.style.boxShadow = "1px 1px 10px red" ;


    }
    else{
        addressInput.style.borderColor = "#B2B9DC" ;
        addressInput.style.borderWidth = "0.1px" ;
        addressInput.style.boxShadow = "none" ;



    }
}



let userNameLable = document.getElementById("userNameLable") ;
let categoryLable = document.getElementById("categoryLable") ;
let descriptionLable = document.getElementById("descriptionLable") ;
let placeLable = document.getElementById("placeLable") ;
let dateLable = document.getElementById("dateLable") ;



let userNameInput = document.getElementById("userNameInput") ;
let categoryInput = document.getElementById("categoryInput") ;
let descriptionInput = document.getElementById("descriptionInput") ;
let placeInput = document.getElementById("placeInput") ;
let dateInput = document.getElementById("dateInput") ;




userNameInput.onfocus = function () {
    userNameLable.classList.remove('LableNonActive') ;
    userNameLable.classList.add('LableActive') ;

    userNameInput.classList.remove('textNonActive') ;
    userNameInput.classList.add('textActive') ;
}
userNameInput.onblur = function () {
    userNameLable.classList.add('LableNonActive') ;
    userNameLable.classList.remove('LableActive') ;

    userNameInput.classList.remove('textActive') ;
    userNameInput.classList.add('textNonActive') ;
}



userNameInput.onkeyup = function(){
    var letters = /^[a-zA-Z]{4,}(?: [a-zA-Z]+){0,2}$/;
    if (  ( !userNameInput.value.match(letters)) ){
        userNameInput.style.borderColor = "red" ;
        userNameInput.style.borderWidth = "3px" ;
        userNameInput.style.boxShadow = "1px 1px 10px red" ;


    }
    else{
        userNameInput.style.borderColor = "#B2B9DC" ;
        userNameInput.style.borderWidth = "0.1px" ;
        userNameInput.style.boxShadow = "none" ;



    }
}








categoryInput.onfocus = function () {
    categoryLable.classList.remove('LableNonActive') ;
    categoryLable.classList.add('LableActive') ;

    categoryInput.classList.remove('textNonActive') ;
    categoryInput.classList.add('textActive') ;
}
categoryInput.onblur = function () {
    categoryLable.classList.add('LableNonActive') ;
    categoryLable.classList.remove('LableActive') ;

    categoryInput.classList.remove('textActive') ;
    categoryInput.classList.add('textNonActive') ;
}








descriptionInput.onfocus = function () {
    descriptionLable.classList.remove('LableNonActive') ;
    descriptionLable.classList.add('LableAreaActive') ;

    descriptionInput.classList.remove('textareaNonActive') ;
    descriptionInput.classList.add('textareaActive') ;
}
descriptionInput.onblur = function () {
    descriptionLable.classList.add('LableNonActive') ;
    descriptionLable.classList.remove('LableAreaActive') ;

    descriptionInput.classList.remove('textareaActive') ;
    descriptionInput.classList.add('textareaNonActive') ;
}
descriptionInput.onkeyup = function(){
    var letters = /^(.|\s)*[a-zA-Z]+(.|\s)*$/;
    if (  ( !descriptionInput.value.match(letters)) ){
        descriptionInput.style.borderColor = "red" ;
        descriptionInput.style.borderWidth = "3px" ;
        descriptionInput.style.boxShadow = "1px 1px 10px red" ;


    }
    else{
        descriptionInput.style.borderColor = "#B2B9DC" ;
        descriptionInput.style.borderWidth = "0.1px" ;
        descriptionInput.style.boxShadow = "none" ;



    }
}



placeInput.onfocus = function () {
    placeLable.classList.remove('LableNonActive') ;
    placeLable.classList.add('LableActive') ;

    placeInput.classList.remove('textNonActive') ;
    placeInput.classList.add('textActive') ;
}
placeInput.onblur = function () {
    placeLable.classList.add('LableNonActive') ;
    placeLable.classList.remove('LableActive') ;

    placeInput.classList.remove('textActive') ;
    placeInput.classList.add('textNonActive') ;
}




dateInput.onfocus = function () {
    dateLable.classList.remove('LableNonActive') ;
    dateLable.classList.add('LableActive') ;

    dateInput.classList.remove('textNonActive') ;
    dateInput.classList.add('textActive') ;
}
dateInput.onblur = function () {
    dateLable.classList.add('LableNonActive') ;
    dateLable.classList.remove('LableActive') ;

    dateInput.classList.remove('textActive') ;
    dateInput.classList.add('textNonActive') ;
}

