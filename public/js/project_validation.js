

function listResult() {

    const url = document.getElementById("url").value;
    console.log(url);


    const apiUrl = 'https://api.github.com/users/chrialge/repos?type=all&per_page=81';

    // Make a GET request
    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // console.log(data);

            let arrayResults = [];

            data.forEach(repo => {
                if (repo.html_url.includes(url) && arrayResults.length < 7) {
                    arrayResults.push(repo.html_url);
                }
            })
            const markup = arrayResults.map(repo => `<li onclick="selectRepo(event)">${repo}</li>`).join('');

            document.getElementById("result").innerHTML = markup;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function selectRepo(e) {
    const selectedRepo = e.target.textContent;
    document.getElementById("url").value = selectedRepo;
    document.getElementById("result").innerHTML = ""; // Clear the list after selection
}

function dropListResult() {


    setTimeout(() => {
        if (document.getElementById("result").innerHTML !== "") {
            document.getElementById("result").innerHTML = ""; // Clear the list when clicking outside
        }

        const inputValue = document.getElementById("url").value.trim();
        const regex = /^(https?:\/\/)?(www\.)?(github\.com|gitlab\.com|bitbucket\.org)\/[a-zA-Z0-9_.-]+\/[a-zA-Z0-9_.-]+$/;
        if (inputValue.match(regex)) {
            document.getElementById("error_url").style.display = ""; // Hide error message if URL is valid
            document.getElementById("url").style.borderColor = ""
        } else {
            console.log('Invalid URL');
            document.getElementById("error_url").style.display = "block";
            document.getElementById("url").style.borderColor = "red"
        }
    }, 200);



}


function checkUrlDemo() {
    const inputValue = document.getElementById('demo_project').value.trim();
    const error = document.getElementById('error_url_demo');
    const regex = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/

    if (!inputValue.match(regex)) {
        error.style.display = "block";
        document.getElementById("demo_project").style.borderColor = "red"
        return false;
    } else {
        return true;
    }
}


function hideErrorUrlDemo() {
    const inputValue = document.getElementById('demo_project').value.trim();
    const error = document.getElementById('error_url_demo');
    const regex = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/

    if (inputValue.match(regex)) {
        error.style.display = "none"; // Hide error message if URL is valid
        document.getElementById("demo_project").style.borderColor = ""
    }
}

function checkVideo() {
    const inputValue = document.getElementById('video').value.trim();
    const error = document.getElementById('error_video');
    const regex = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/

    if (!inputValue.match(regex)) {
        error.style.display = "block";
        document.getElementById("video").style.borderColor = "red"
        return false;
    } else {
        return true;
    }
}

function hideErrorVideo() {
    const inputValue = document.getElementById('video').value.trim();
    const error = document.getElementById('error_video');
    const regex = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/

    if (inputValue.match(regex)) {
        error.style.display = "none"; // Hide error message if URL is valid
        document.getElementById("video").style.borderColor = ""
    }
}


function checkForm(e) {

    const btnEl = document.querySelector('.button_create');
    const btnLoadingEl = document.querySelector('.btn_loading');

    btnEl.style.display = "none";
    btnLoadingEl.style.display = "block"

    if (document.getElementById('demo_project').value.length > 0 && checkUrlDemo()) {
        btnEl.style.display = "";
        btnLoadingEl.style.display = "";
        e.preventDefault();
    }

    if (document.getElementById('video').value.length > 0 && checkVideo()) {
        btnEl.style.display = "";
        btnLoadingEl.style.display = "";
        e.preventDefault();
    }
}