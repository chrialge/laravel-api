function check_name() {
    const valueInput = document.getElementById('name').value.trim();
    const errorMessage = document.getElementById('error_name_js');
    const regex = /^[a-zA-Z]+$/;

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
    const regex = /^[a-zA-Z]+$/;



    if (valueInput.length > 3 && valueInput.match(regex)) {
        document.getElementById('name').style.borderColor = "";
        errorMessage.style.display = "";
    }
}

function check_url() {
    const valueInput = document.getElementById('url_git').value.trim();
    const errorMessage = document.getElementById('error_url_js');
    const regex = /^(https?:\/\/)?(www\.)?(github\.com|gitlab\.com|bitbucket\.org)\/[a-zA-Z0-9_.-]+\/[a-zA-Z0-9_.-]+$/;

    if (!valueInput.match(regex)) {
        document.getElementById('url_git').style.borderColor = "red";
        errorMessage.style.display = "block";
        return false;
    } else {
        return true;
    }
}

function hide_error_url() {
    const valueInput = document.getElementById('url_git').value.trim();
    const errorMessage = document.getElementById('error_url_js');
    const regex = /^(https?:\/\/)?(www\.)?(github\.com|gitlab\.com|bitbucket\.org)\/[a-zA-Z0-9_.-]+\/[a-zA-Z0-9_.-]+$/;

    if (valueInput.match(regex)) {
        errorMessage.style.display = "";
        document.getElementById('url_git').style.borderColor = "";
    }
}