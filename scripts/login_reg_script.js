function ShowLoginPanel() {
    document.querySelector('.login__overlay').classList.add("active");
    let inputs = document.querySelectorAll('.login__form_input');
    inputs[0].value = "";
    inputs[1].value = "";
}
function HideLoginPanel() {
    document.querySelector('.login__overlay').classList.remove("active");
}
function ShowrRegisterPanel() {
    document.querySelector('.register__overlay').classList.add("active");
    let inputs = document.querySelectorAll('.register__form_input');
    inputs[0].value = "";
    inputs[1].value = "";
    inputs[2].value = "";
    inputs[3].value = "";
}
function HideRegisterPanel() {
    document.querySelector('.register__overlay').classList.remove("active");
}
function GoToRegister() {
    let loginOverlay = document.querySelector('.login__overlay');
    if (loginOverlay.classList.contains("active")) {
        HideLoginPanel();
        ShowrRegisterPanel();
    }
    else {
        ShowrRegisterPanel();
    }
}
function GoToLogin() {
    let registerOverlay = document.querySelector('.register__overlay');
    if (registerOverlay.classList.contains("active")) {
        HideRegisterPanel();
        ShowLoginPanel();
    }
    else {
        ShowLoginPanel();
    }
}
function Login_Click(event) {
    let inputs = document.querySelectorAll('.login__form_input');
    if (inputs[0].value == "", inputs[1].value == "") {
        event.preventDefault();
    }
}

const isLogin = localStorage.getItem('isLogin');

localStorage.setItem('isLogin', '0');
const userId = localStorage.getItem('userId');
const userName = localStorage.getItem('userName');
const userSurname = localStorage.getItem('userSurname');
const userEmail = localStorage.getItem('userEmail');
const userPassword = localStorage.getItem('userPassword');
if (isLogin == 1) {

    document.querySelector('.login__overlay').classList.add("active");
    let inputs = document.querySelectorAll('.login__form_input');
    inputs[0].value = "";
    inputs[1].value = "";
    document.querySelectorAll('.login__form_input').forEach(element => {
        element.style.borderColor = "orangered"; `1`
    });
}
if (userId == 'null') {
    document.getElementById('adminpage').style.visibility = "hidden";
    document.getElementById('username').innerHTML = "Visitator";
}
else {
    document.getElementById('username').innerHTML = userName + " " + userSurname;
}

