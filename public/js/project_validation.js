

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
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
}