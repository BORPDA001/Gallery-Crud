<?php
session_start();
$action = "";
$roots = $_SERVER["DOCUMENT_ROOT"]."/blog";
require_once "$roots/server/app/DB.php";
require_once "$roots/server/app/auth.php";
require_once "$roots/server/app/posts.php";
require_once "$roots/server/lib/functions.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_GET['action']) AND $_GET['action'] != ""){
    $action = $_GET['action'];
}else if (isset($_POST['action']) AND $_POST['action'] != ""){
    $action = $_POST['action'];
}
$auth = new Auth();
$posts = new Posts();

if($action == "register") {
    $auth->register([
        "user_name" => inp($_POST['user_name']),
        "user_email" => inp($_POST['user_email']),
        "user_password" => hash_password(inp($_POST['user_password']))
    ]);
}
else if($action == "login") {
    $auth->login([
        'user_email' => inp($_POST['user_email']),
        'user_password' => hash_password(inp($_POST['user_password'])),
    ]);
}
else if($action == "logout") {
    $auth->logout($_GET['user_id']);
}
else if($action == "create_post") {
    $post_image = "";
    if (!empty($_FILES["post_image"]["name"])) {
        $post_image = upload_file($_FILES["post_image"],"$roots/server/public/uploads/");
    }
    $posts->createPost([
        "user_id" =>  $_SESSION['user']['id'],
        "post_title" => $_POST['post_title'],
        "post_description" => $_POST['post_description'],
        "post_image" => $post_image
    ]);
}
else if($action == "getMyPosts") {
    echo $posts->getPosts($_SESSION["user"]["id"]);
}
else if($action == "getPosts") {
    echo $posts->getPosts("");
}
else if($action == "deleteMyPost") {
    $posts->deletePost($_SESSION["user"]["id"],$_GET["post_id"]);
}
else if($action == "likePost") {
    $posts->likePost($_SESSION["user"]["id"],$_GET["post_id"]);
}
else if($action == "getMyWishListCount") {
  echo  $posts->getMyWishListCount($_SESSION["user"]["id"]);
}
else if($action == "getMyWishList") {
    echo  $posts->getMyWishList($_SESSION["user"]["id"]);
}
unset($auth);
unset($posts);
