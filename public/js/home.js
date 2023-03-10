// CRIAR POST
btnCreate = document.querySelector('#postCreate');

btnCreate.addEventListener('click', function () {
    var postTitle = document.querySelector('#postTitle').value;
    var postDescription = document.querySelector('#postDescription').value;

    axios.post('/createpost', {
        postTitle,
        postDescription
    }).then(function (response) {
        console.log(response);
        // window.location.reload();
    }).catch(function (error) {
        console.log(error);
    });

})
