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


function createToast(message, type){
    const $toastContainer = $("#toastContainer");

    // Create the toast element
    const $toast = $(`
    <div class="toast align-items-center text-bg-${type} border-0 mt-2" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
        <div class="toast-body">${message}</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    `);

    // Append the toast to the container
    $toastContainer.append($toast);

    // Initialize and show the toast
    const toast = new bootstrap.Toast($toast[0]);
    toast.show();

    // Remove the toast from DOM when hidden
    $toast.on("hidden.bs.toast", function () {
        $(this).remove();
    });
};


function validForm(form){
    $(form).addClass('was-validated');
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
