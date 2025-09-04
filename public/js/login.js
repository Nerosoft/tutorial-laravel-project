function IsEmail(event, error1, error2) {
    const regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(event.validity.valueMissing)
        event.setCustomValidity(error1);
    else if (event.validity.typeMismatch)
        event.setCustomValidity(error2);
    else 
        event.setCustomValidity('');
    
}
function closeModel(lang, id){
        closeForm(id);
        $('.flexCheck').each(function(idx, el){
            if(el.checked && el.value != lang)
                setLanguage(lang);
        });
}
function setLanguage(element){
    $('.flexCheck').each(function(idx, el){
        el.checked = element == el.value;
    });
}
