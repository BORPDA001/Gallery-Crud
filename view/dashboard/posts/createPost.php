<?php
session_start();
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    $_SESSION['msg'] = [
        "status" => "warning",
        "text" => "Login please!"
    ];
    header("location:http://localhost/blog/view/auth/login.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/cbd5e98839.js" crossorigin="anonymous"></script>
    <title>Gallery/Create Post</title>
    <link rel="stylesheet" href="http://localhost/blog/server/public/css/footer.css">
    <link rel="stylesheet" href="../../../server/public/css/style.css">
    <link rel="icon" type="image/x-icon" href="http://localhost/blog/server/public/images/favicon.png">

</head>
<style>
    section{
        width: 100%;
        height: auto;
    }
    .page_title{
        width: 100%;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .page_title>h1{
        font-family: sans-serif;
    }
    .form_parent{

        width: 100%;
        min-height: 400px;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .form_parent>form{
        width: 400px;
        height: 100%;
        padding: 40px;
        box-shadow: 0px 3px 57px -18px rgba(0,0,0,0.75);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border-radius: 15px;
    }
    .form_row{
        width: 100%;
        margin: 10px auto;
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form_row>input{
        width: 100%;
        padding: 15px;
        border: none;
        border: 1px solid gray;
        border-radius: 10px;
    }
    .btn{
        border-radius: 10px;
        width: 100%;
        padding: 15px;
        border: none;
        background-color: rgb(164, 164, 164) !important;
        transition: .3s;
        color: #fafafa;
        font-size: 20px;
    }
    .form_row>input::placeholder{font-size: 15px;
    }
</style>
<body>
<?php
include("../../inc/header.php");
?>
<main>
    <section>
        <div class="container">
            <div class="page_title">
                <h1>Create Post</h1>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="form_parent">
                <form action="../../../server/routes/web.php" method="post" enctype="multipart/form-data">
                    <div class="form_row">
                        <input type="text" name="post_title" placeholder="Post Title" required >
                    </div>
                    <div class="form_row">
                        <input type="file" name="post_image" required>
                    </div>
                    <div class="form_row">
                        <textarea name="post_description" id="" cols="40" rows="5"></textarea>
                    </div>
                    <div class="form_row">
                        <input type="hidden" name="action" value="create_post">
                        <button class="btn">
                            Create Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<?php
include("../../inc/footer.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../../../server/public/js/main.js"></script>
</body>
</html>
