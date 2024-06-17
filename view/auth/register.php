<?php

session_start();
if (isset($_SESSION['user'])) {
    header("location:http://localhost/blog/view/dashboard/home.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Gallery</title>
    <link rel="stylesheet" href="http://localhost/blog/server/public/css/auth.css">
    <link rel="icon" type="image/x-icon" href="http://localhost/blog/server/public/images/favicon.png">

</head>
<body>
<div class="container">
    <div class="content">
        <form action="../../server/routes/web.php" method="POST">
            <div class="form_row">
                <h1>
                    Register
                </h1>
            </div>
            <div class="form_row">
                <input type="text" name="user_name" placeholder="Name">
            </div>
            <div class="form_row">
                <input type="email" name="user_email" placeholder="Email">
            </div>
            <div class="form_row">
                <input type="password" name="user_password" placeholder="Password">
            </div>
            <div class="form_row">
                <input type="hidden" name="action" value="register">
                <button  class="btn">
                    Register
                </button>
            </div>
            <div class="form_row">
                <a href="./Login.php">Login here</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
