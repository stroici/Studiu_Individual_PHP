function Get_User_Buttons() {
    let user_buttons = document.querySelectorAll('.data_button');
    if (user_buttons[0]) {
        user_buttons[0].classList.add('active');
    }
}