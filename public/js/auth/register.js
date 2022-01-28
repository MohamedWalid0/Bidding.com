

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


