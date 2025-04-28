
function listResult() {

    const url = document.getElementById("url").value;
    console.log(url);


    const apiUrl = 'https://api.github.com/users/chrialge/repos?type=all&per_page=81';

    // // Make a GET request
    // fetch(apiUrl)
    //     .then(response => {
    //         if (!response.ok) {
    //             throw new Error('Network response was not ok');
    //         }
    //         return response.json();
    //     })
    //     .then(data => {
    //         // console.log(data);

    //         let arrayResults = [];

    //         data.forEach(repo => {
    //             if (repo.html_url) {

    //                 if (repo.html_url.includes(url)) {
    //                     console.log(repo.html_url.includes(url));
    //                     while (arrayResults.length < 5) {
    //                         console.log(repo.html_url);
    //                         arrayResults.push(repo.html_url);

    //                     }


    //                 }
    //             }

    //         })


    //     })
    //     .catch(error => {
    //         console.error('Error:', error);
    //     });
}