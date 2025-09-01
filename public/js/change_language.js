let setting = [
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': false }
];

function displayModel(form, value){
    openForm(form);
    $(form).find('#lang_name').val(value);
}