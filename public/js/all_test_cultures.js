let setting = [
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': false, className: "text-left" },
];

function displayEditForm(id, name, shortcut, price, input_output_lab, nameTset, shortcutTest, priceTest, inputOutputLabTest){
    openForm(id);
    name.val(nameTset);
    shortcut.val(shortcutTest);
    price.val(priceTest);
    input_output_lab.each(function(idx, el){
        if($(this).html() === inputOutputLabTest)
            $(this).prop('selected', true);
    });
}