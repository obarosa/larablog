// LIKE OR UNLIKE POST

btnLike = document.querySelectorAll('#postLikeButton');

btnLike.forEach(element => {
    element.addEventListener('click', function(){
        var postId = element.getAttribute('idPost');

        axios.post('/like',{
            postId,
        }).then(function(response){
            // console.log(response);
        }).catch(function(error){
            // console.log(error);
        })
    })

});
