function confirmPassword(form) {
    return $(form).find('#password_confirmation').val() === $(form).find('#password').val();
}

function handleInput2(event, error1, error2, error3) {
    if (event.validity.valueMissing)
        event.setCustomValidity(error1);
    else if (event.validity.tooShort)
        event.setCustomValidity(error2);
    else if(event.value != $('#password').val())
        event.setCustomValidity(error3);
    else
        event.setCustomValidity('');
}