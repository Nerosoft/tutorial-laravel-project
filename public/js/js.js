function openForm(id){
    $(id).modal('show');
}
function closeForm(id){
    $(id).modal('hide');
}

function handleInput(event, error1, error2) {
    if (event.validity.valueMissing)
        event.setCustomValidity(error1);
    else if (event.validity.tooShort)
        event.setCustomValidity(error2);
    else
        event.setCustomValidity('');
}






function removeClass(id){
    $(id).find('form').removeClass('was-validated');
}

function handleInputPhone(event, error1, error2) {
    if (event.validity.valueMissing)
        event.setCustomValidity(error1);
    else if (event.validity.patternMismatch)
        event.setCustomValidity(error2);
    else
        event.setCustomValidity('');
}
function handleInputSelect(event, error1) {
    if (event.validity.valueMissing)
        event.setCustomValidity(error1);
    else
        event.setCustomValidity('');
}

