let setting = [
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': false }
];
function displayEditForm(id, name){
    removeClass(id);
    openForm(id);
    $(id).find('#name').val(name);
}

function handleInputCustomTable(event, error1, error2) {
    if (event.validity.valueMissing)
        event.setCustomValidity(error1);
    else if (event.value < 1 || event.value > 8)
        event.setCustomValidity(error2);
    else
        event.setCustomValidity('');
}