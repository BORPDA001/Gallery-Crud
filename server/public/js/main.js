jQuery(document).ready(function($) {
    $.ajax({
        url:"http://localhost/blog/server/routes/web.php",
        method:"get",
        data:{action:"getMyWishListCount"},
        success:function(response) {
                        let res = JSON.parse(response);
                        $(".notification").html(res[0].like_count);
            $('.notification').css({
                'width': '15px',
                'display': 'inline-block',
                'font-size': '15px',
                'background-color': 'red',
                'border-radius': '50%',
                'text-align': 'center',
                'color': '#fafafa'
            });
        },
        error: function (er) {
        }
    });
});