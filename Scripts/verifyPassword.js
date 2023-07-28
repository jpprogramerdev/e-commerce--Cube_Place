let password = document.getElementById('pwd_user')
let confirm_password = document.getElementById('pwd_user_confirm')

function validatePassword(){
    if(password.value != confirm_password.value){
        confirm_password.setCustomValidity("Senhas diferentes!")
    }else{
        confirm_password.setCustomValidity("")
    }
}

password.onchange = validatePassword
confirm_password.onkeyup = validatePassword