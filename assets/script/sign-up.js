let fullnamePatern = /^[a-zA-Z ]{5,20}$/
let emailPatern = /[@]/
let fullnameError = document.querySelector("#fullname-validation")
let emailError = document.querySelector("#email-validation")
let passwordError = document.querySelector("#password-validation")
let password2Error = document.querySelector("#password2-validation")
let form = document.querySelector("form")
form.addEventListener("submit",(e) => {
    let erreur = false
    if(fullnamePatern.test(form.fullname.value))
        fullnameError.innerHTML = ""
    else{
        fullnameError.innerHTML = "fullname invalid"
        erreur = true
    }
    if(emailPatern.test(form.email.value))
        emailError.innerHTML = ""
    else{
        emailError.innerHTML = "email invalid"
        erreur = true
    }
    if(form.password.value.length >= 8)
        passwordError.innerHTML = ""
    else{
        passwordError.innerHTML = "password invalid"
        erreur = true
    }
    if(form.password.value === form.password2.value)
        password2Error.innerHTML = ""
    else{
        password2Error.innerHTML = "invalide confirmation"
        erreur = true
    }
    if(erreur)
        e.preventDefault()
})