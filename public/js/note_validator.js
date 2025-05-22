function check_name() {
    const valueInput = document.getElementById('name').value.trim();
    const errorMessage = document.getElementById('error_name_js');
    const regex = /^[a-zA-Z\s]+$/;

    if (valueInput.length <= 3 || !valueInput.match(regex)) {
        document.getElementById('name').style.borderColor = "red";
        errorMessage.style.display = "block";
        return false;
    } else {
        return true;
    }
}

function hide_error_name() {
    const valueInput = document.getElementById('name').value.trim();
    const errorMessage = document.getElementById('error_name_js');
    const regex = /^[a-zA-Z\s]+$/;



    if (valueInput.length > 3 && valueInput.match(regex)) {
        document.getElementById('name').style.borderColor = "";
        errorMessage.style.display = "";
    }
}

function check_content() {
    const valueInput = document.getElementById('content').value.trim();
    const errorMessage = document.getElementById('error_content_js');

    if (valueInput.length <= 20) {
        document.getElementById('content').style.borderColor = "red";
        errorMessage.style.display = "block";
        return false;
    } else {
        return true;
    }
}

function hide_error_content() {
    const valueInput = document.getElementById('content').value.trim();
    const errorMessage = document.getElementById('error_content_js');


    if (valueInput.length > 20) {
        document.getElementById('content').style.borderColor = "";
        errorMessage.style.display = "";
    }
}

function check_form_update(e) {


    const btnEl = document.getElementById('btn_confirm');
    const btnLoading = document.querySelector('.btn_loading');

    btnEl.style.display = 'none';
    btnLoading.style.display = 'block';

    if (!check_name()) {
        e.preventDefault();
        btnEl.style.display = '';
        btnLoading.style.display = '';
    }

    if (!check_content()) {

        e.preventDefault();
        btnEl.style.display = '';
        btnLoading.style.display = '';
    }
}