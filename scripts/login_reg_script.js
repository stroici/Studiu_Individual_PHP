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