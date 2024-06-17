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
    <title>Gallery/MYPosts</title>
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
    #card_parent{
        width: 100%;
        height: auto;
        display: flex;  flex-wrap: wrap;justify-content: center;
        gap: 10px;
    }

    .card {
        width: 200px;
        height: 220px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        padding: 10px;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-direction: column;
    }
    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    .card_header{
        width: 100%;
        height: 100px;
    }
    .card_content{
        width: 100%;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: sans-serif;
    }
    .btn_group{
        width: 100%;
        height: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .btn_group>.like{
        width: 30px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        background:white;
        color: gray;
        border: 1px solid gray;
        border-radius: 50%;
        transition: .3s;
    }
    .btn_group>.like:hover{
        color: #ff9191;
        cursor: pointer;

    }
    .btn_group>.delete{
        width: 30px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        background:white;
        color: red;
        border: 1px solid gray;
        border-radius: 50%;
        transition: .3s;
    }
    .active_like{
        color: red !important;
    }
    .btn_group>.delete:hover{
        color: gray;
        cursor: pointer;

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
                <h1>MyPosts</h1>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div id="card_parent">

            </div>
        </div>
    </section>
</main>
<?php
include("../../inc/footer.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../../../server/public/js/main.js"></script>
<script src="../../../server/public/js/posts.js"></script>


</body>
</html>
