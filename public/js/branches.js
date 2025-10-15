let setting = [
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': true, className: "text-left" },
    { 'searchable': false }
];

function displayEditForm(brance_rays_name, brance_rays_phone, brance_rays_country, brance_rays_governments, brance_rays_city, brance_rays_street, brance_rays_building, brance_rays_address, brance_rays_follow, id, nameTest, phoneTest, countryTest, governmentsTest, cityTest, streetTest, buildingTest, addressTest, followTest){
    removeClass(id);
    openForm(id);
    brance_rays_name.val(nameTest);
    brance_rays_phone.val(phoneTest);
    brance_rays_country.val(countryTest);
    brance_rays_governments.val(governmentsTest);
    brance_rays_city.val(cityTest);
    brance_rays_street.val(streetTest);
    brance_rays_building.val(buildingTest);
    brance_rays_address.val(addressTest);
    brance_rays_follow.each(function(idx, el){
        if($(this).html() === followTest)
            $(this).prop('selected', true);
    });
}