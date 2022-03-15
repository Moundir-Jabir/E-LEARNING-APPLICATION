let emailPatern = /[@]/
let emailError = document.querySelector("#email-validation")
let passwordError = document.querySelector("#password-validation")
let form = document.querySelector("form")
form.addEventListener("submit",(e) => {
    let erreur = false
    if(emailPatern.test(form.email.value))
        emailError.innerHTML = ""
    else{
        emailError.innerHTML = "email invalid"
        erreur = true
    }
    if(form.password.value != "")
        passwordError.innerHTML = ""
    else{
        passwordError.innerHTML = "champ obligatoire"
        erreur = true
    }
    if(erreur)
        e.preventDefault()
})