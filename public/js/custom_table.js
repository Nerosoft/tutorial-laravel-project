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