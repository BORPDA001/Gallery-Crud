jQuery(document).ready(function($) {
    function viewMyPosts(posts) {
        if(posts.length > 0) {
            let card = '';
            let exit = $(".exit");
            posts.forEach((post, index) => {
                let user_id = exit.data("user-id");
                let creator_id = post.creator_id
                let like = post.like_count;
                let activeClass = like > 0 ? 'active_like' : '';
                let isCreator = user_id == creator_id;
                console.log(isCreator)
                let deleteButton = isCreator ? `<button class="delete" data-post-id="${post.id}"><i class="fa-solid fa-trash"></i></button>` : '';
                card += `
        <div class="card">
            <div class="card_header">
                <img style="max-height: 100px; width: 100%;" src="http://localhost/blog/server/public/uploads/${post.post_image}">
            </div>
            <div class="card_content">
                <h4><b>${post.post_title}</b></h4>
                <p>${post.post_description}</p>
            </div>
            <div class="btn_group">
                <button class="like ${activeClass}" data-post-id="${post.id}">
                    <i class="fa-solid fa-heart"></i>
                </button>
                ${deleteButton}
            </div>
        </div>
    `;
            });
            $("#card_parent").html(card);
            $(".like").click(function (){
                $(this).toggleClass('active_like');
                let post_id = $(this).data("post-id");
                $.ajax({
                    url:"http://localhost/blog/server/routes/web.php",
                    method:"get",
                    data:{action:"likePost",post_id:post_id},
                    success:function(response) {
                    },
                    error: function (er) {
                    }
                });
            });
            $(".delete").click(function (){
                let post_id = $(this).data("post-id");
                console.log(post_id)
                $.ajax({
                    url:"http://localhost/blog/server/routes/web.php",
                    method:"get",
                    data:{action:"deleteMyPost",post_id:post_id},
                    success:function(response) {
                        alert("post deleted successfully");
                    },
                    error: function (er) {
                        alert("post vas not deleted");
                    }
                });
            });
        }
    }
    let fullUrl = window.location.href;
    let action = "";
    if (fullUrl=="http://localhost/blog/view/dashboard/posts/index.php"){
        action = "getMyPosts";
    }else if(fullUrl == "http://localhost/blog/view/dashboard/home.php"){
        action = "getPosts";
      }else if(fullUrl == "http://localhost/blog/view/dashboard/posts/visitList.php"){
    action = "getMyWishList";
    }
    $.ajax({
        url:"http://localhost/blog/server/routes/web.php",
        method:"get",
        data:{action:action},
        dataType:"json",
        success:function(response) {
            viewMyPosts(response);
            console.log(response);
        },
        error: function (er) {
            console.log(er)
        }
    });
});